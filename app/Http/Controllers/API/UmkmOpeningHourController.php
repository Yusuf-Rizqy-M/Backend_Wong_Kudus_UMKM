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

        $umkmCheck = Umkm::find($data['umkm_id']);
        if (!$umkmCheck || $umkmCheck->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan atau tidak aktif'
            ], 404);
        }

        $existing = UmkmOpeningHour::where('umkm_id', $data['umkm_id'])
            ->where('day', $data['day'])
            ->first();

        if ($existing) {
            $existing->update(array_merge($data, ['status' => 'active']));
            return response()->json([
                'status' => true,
                'message' => 'Jam operasional berhasil diperbarui',
                'data' => $existing
            ], 200);
        }

        $data['status'] = 'active';
        $hour = UmkmOpeningHour::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil dibuat',
            'data' => $hour
        ], 201);
    }

    public function show($id)
    {
        $hour = UmkmOpeningHour::find($id);

        if (!$hour || $hour->status !== 'active') {
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
            'umkm_id' => 'sometimes|exists:umkms,id',
            'day' => ['sometimes', Rule::in($this->days)],
            'hours' => 'nullable|string|max:255',
            'is_open' => 'sometimes|boolean',
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

        if (isset($data['day']) || isset($data['umkm_id'])) {
            $umkmId = $data['umkm_id'] ?? $hour->umkm_id;
            $day = $data['day'] ?? $hour->day;

            $duplicate = UmkmOpeningHour::where('umkm_id', $umkmId)
                ->where('day', $day)
                ->where('id', '!=', $id)
                ->first();

            if ($duplicate) {
                return response()->json([
                    'status' => false,
                    'message' => 'Jam operasional untuk hari ' . $day . ' sudah ada.',
                ], 409);
            }
        }

        $hour->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil diperbarui',
            'data' => $hour
        ], 200);
    }

    public function destroy($id)
    {
        $hour = UmkmOpeningHour::find($id);

        if (!$hour) {
            return response()->json([
                'status' => false,
                'message' => 'Jam operasional tidak ditemukan',
            ], 404);
        }

        $hour->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Jam operasional berhasil dinonaktifkan',
            'data' => $hour
        ], 200);
    }

    public function getByUmkmId($umkm_id)
    {
        $umkm = Umkm::find($umkm_id);
        if (!$umkm || $umkm->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan atau tidak aktif',
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
