<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GaleriUmkm;
use App\Models\Umkm; // Untuk validasi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GaleriUmkmController extends Controller
{
    /**
     * Helper untuk mengubah path gambar menjadi URL
     */
    private function getImageUrl($galeri)
    {
        if ($galeri->image) {
            $galeri->image = url(Storage::url($galeri->image));
        }
        return $galeri;
    }

    /**
     * Menampilkan semua galeri yang 'active'.
     */
    public function index()
    {
        $galeries = GaleriUmkm::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($galeri) {
                return $this->getImageUrl($galeri);
            });

        return response()->json([
            'status' => true,
            'message' => 'Daftar galeri berhasil diambil',
            'data' => $galeries
        ], 200);
    }

    /**
     * Menyimpan data galeri baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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

        // Handle upload gambar
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/galeri', 'public');
            $data['image'] = $path;
        }

        $galeri = GaleriUmkm::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil dibuat',
            'data' => $this->getImageUrl($galeri)
        ], 201);
    }

    /**
     * Menampilkan detail satu galeri.
     */
    public function show($id)
    {
        $galeri = GaleriUmkm::find($id);

        if (!$galeri) {
            return response()->json([
                'status' => false,
                'message' => 'Galeri tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail galeri berhasil diambil',
            'data' => $this->getImageUrl($galeri)
        ], 200);
    }

    /**
     * Memperbarui data galeri.
     * Menggunakan POST untuk file upload (sesuai rute Anda)
     */
    public function update(Request $request, $id)
    {
        // Temukan galeri
        $galeri = GaleriUmkm::find($id);
        if (!$galeri) {
            return response()->json([
                'status' => false,
                'message' => 'Galeri tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'umkm_id' => 'sometimes|required|exists:umkms,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Nullable jika tidak ganti gambar
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

        // Handle update gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            // Simpan gambar baru
            $path = $request->file('image')->store('uploads/galeri', 'public');
            $data['image'] = $path;
        }

        $galeri->update($data);
        $galeri->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil diperbarui',
            'data' => $this->getImageUrl($galeri)
        ], 200);
    }

    /**
     * Menghapus galeri (Soft Delete).
     */
    public function destroy($id)
    {
        $galeri = GaleriUmkm::find($id);

        if (!$galeri) {
            return response()->json([
                'status' => false,
                'message' => 'Galeri tidak ditemukan',
            ], 404);
        }

        if ($galeri->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Galeri sudah tidak aktif',
            ], 400);
        }

        $galeri->status = 'inactive';
        $galeri->save();
        $galeri->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil dinonaktifkan',
            'data' => $this->getImageUrl($galeri)
        ], 200);
    }

    /**
     * Mengambil galeri berdasarkan umkm_id (sesuai file rute Anda).
     */
    public function getByUmkmId($umkm_id)
    {
        // Cek apakah UMKM ada
        if (!Umkm::where('id', $umkm_id)->exists()) {
             return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
            ], 404);
        }
        
        $galeries = GaleriUmkm::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($galeri) {
                return $this->getImageUrl($galeri);
            });
            
        return response()->json([
            'status' => true,
            'message' => 'Galeri berdasarkan UMKM berhasil diambil',
            'data' => $galeries
        ], 200);
    }
}