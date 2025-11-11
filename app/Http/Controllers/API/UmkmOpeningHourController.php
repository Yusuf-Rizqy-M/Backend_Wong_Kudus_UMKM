<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UmkmOpeningHour;
use App\Models\Umkm; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; 

class UmkmOpeningHourController extends Controller
{
    private $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    /**
     * Menampilkan semua jam operasional yang 'active'.
     */
    public function index()
    {
        $hours = UmkmOpeningHour::where('status', 'active')
            ->orderBy('umkm_id')
            ->orderByRaw("FIELD(day, '" . implode("','", $this->days) . "')")
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar jam operasional berhasil diambil',
            'data' => $hours
        ], 200);
    }

    /**
     * Menyimpan data jam operasional baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'day' => ['required', Rule::in($this->days)],
            'hours' => 'nullable|string|max:255',
            'is_open' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }
        
        $data = $validator->validated();
        $data['status'] = 'active';

        // Validasi agar tidak duplikat hari per UMKM
        $existing = UmkmOpeningHour::where('umkm_id', $data['umkm_id'])
                                  ->where('day', $data['day'])
                                  ->first();

        if ($existing) {
             return response()->json([
                'status' => false,
                'message' => 'Jam operasional untuk hari ' . $data['day'] . ' sudah ada.',
            ], 409); // 409 Conflict
        }

        $hour = UmkmOpeningHour::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil dibuat',
            'data' => $hour
        ], 201);
    }

    /**
     * Menampilkan detail satu jam operasional.
     */
    public function show($id)
    {
        $hour = UmkmOpeningHour::find($id);

        if (!$hour) {
            return response()->json([
                'status' => false,
                'message' => 'Jam operasional tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail jam operasional berhasil diambil',
            'data' => $hour
        ], 200);
    }

    /**
     * Memperbarui data jam operasional.
     */
    public function update(Request $request, $id)
    {
        $hour = UmkmOpeningHour::find($id);
        if (!$hour) {
            return response()->json([
                'status' => false,
                'message' => 'Jam operasional tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'umkm_id' => 'sometimes|required|exists:umkms,id',
            'day' => ['sometimes', 'required', Rule::in($this->days)],
            'hours' => 'nullable|string|max:255',
            'is_open' => 'sometimes|required|boolean',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }
        
        $data = $validator->validated();

        // Validasi duplikat jika hari atau umkm_id diubah
        if (isset($data['day']) || isset($data['umkm_id'])) {
            $umkmId = $data['umkm_id'] ?? $hour->umkm_id;
            $day = $data['day'] ?? $hour->day;

            $existing = UmkmOpeningHour::where('umkm_id', $umkmId)
                                      ->where('day', $day)
                                      ->where('id', '!=', $id) // Abaikan data saat ini
                                      ->first();
            if ($existing) {
                return response()->json([
                    'status' => false,
                    'message' => 'Jam operasional untuk hari ' . $day . ' sudah ada.',
                ], 409);
            }
        }

        $hour->update($data);
        $hour->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil diperbarui',
            'data' => $hour
        ], 200);
    }

    /**
     * Menghapus jam operasional (Soft Delete).
     */
    public function destroy($id)
    {
        $hour = UmkmOpeningHour::find($id);

        if (!$hour) {
            return response()->json([
                'status' => false,
                'message' => 'Jam operasional tidak ditemukan',
            ], 404);
        }

        if ($hour->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Jam operasional sudah tidak aktif',
            ], 400);
        }

        $hour->status = 'inactive';
        $hour->save();
        $hour->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil dinonaktifkan',
            'data' => $hour
        ], 200);
    }

    /**
     * (Tambahan) Mengambil jam operasional berdasarkan umkm_id.
     */
    public function getByUmkmId($umkm_id)
    {
        if (!Umkm::where('id', $umkm_id)->exists()) {
             return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
            ], 404);
        }
        
        $hours = UmkmOpeningHour::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->orderByRaw("FIELD(day, '" . implode("','", $this->days) . "')")
            ->get();
            
        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berdasarkan UMKM berhasil diambil',
            'data' => $hours
        ], 200);
    }
}