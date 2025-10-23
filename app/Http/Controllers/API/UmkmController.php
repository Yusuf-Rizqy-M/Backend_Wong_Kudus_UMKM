<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('category')->get()->map(function ($umkm) {
            if ($umkm->image) {
                $umkm->image = url(Storage::url($umkm->image));
            }
            return $umkm;
        });

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan semua data UMKM',
            'data' => $umkms
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'review_count' => 'nullable|integer|min:0',
            'address' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|in:Kudus Kota,Jati,Bae,Mejobo,Undaan,Gebog,Dawe',
            'map_link' => 'nullable|url|max:255',
            'jam_buka' => 'nullable|date_format:H:i',
            'jam_tutup' => 'nullable|date_format:H:i',
            'no_wa' => 'nullable|string|min:10|max:20', // ✅ minimal 10 karakter
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/umkm', 'public');
            $data['image'] = $path;
        }

        $umkm = Umkm::create($data);

        if ($umkm->image) {
            $umkm->image = url(Storage::url($umkm->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Data UMKM berhasil ditambahkan',
            'data' => $umkm
        ], 201);
    }

    public function show($id)
    {
        $umkm = Umkm::with('category')->find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'Data UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($umkm->image) {
            $umkm->image = url(Storage::url($umkm->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail data UMKM ditemukan',
            'data' => $umkm
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'Data UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'sometimes|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'review_count' => 'nullable|integer|min:0',
            'address' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|in:Kudus Kota,Jati,Bae,Mejobo,Undaan,Gebog,Dawe',
            'map_link' => 'nullable|url|max:255',
            'jam_buka' => 'nullable|date_format:H:i',
            'jam_tutup' => 'nullable|date_format:H:i',
            'no_wa' => 'nullable|string|min:10|max:20', // ✅ minimal 10 karakter
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            if ($umkm->image && Storage::disk('public')->exists($umkm->image)) {
                Storage::disk('public')->delete($umkm->image);
            }
            $path = $request->file('image')->store('uploads/umkm', 'public');
            $data['image'] = $path;
        }

        $umkm->update($data);

        if ($umkm->image) {
            $umkm->image = url(Storage::url($umkm->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Data UMKM berhasil diperbarui',
            'data' => $umkm
        ], 200);
    }

    public function destroy($id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'Data UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($umkm->status === 'inactive') {
            if ($umkm->image && !str_starts_with($umkm->image, 'http')) {
                $umkm->image = asset('storage/' . $umkm->image);
            }

            return response()->json([
                'status' => false,
                'message' => 'Data UMKM sudah tidak aktif',
                'data' => $umkm
            ], 400);
        }

        $umkm->status = 'inactive';
        $umkm->save();

        if ($umkm->image && !str_starts_with($umkm->image, 'http')) {
            $umkm->image = asset('storage/' . $umkm->image);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data UMKM berhasil dinonaktifkan',
            'data' => $umkm
        ], 200);
    }

    public function countByKecamatan($kecamatan)
    {
        $validKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        if (!in_array($kecamatan, $validKecamatan)) {
            return response()->json([
                'status' => false,
                'message' => 'Nama kecamatan tidak valid',
                'data' => null
            ], 400);
        }

        $count = Umkm::where('kecamatan', $kecamatan)
            ->where('status', 'active')
            ->count();

        return response()->json([
            'status' => true,
            'message' => "Jumlah UMKM di kecamatan {$kecamatan}",
            'kecamatan' => $kecamatan,
            'total_umkm' => $count
        ], 200);
    }
}
