<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule; // <-- DITAMBAHKAN

class UmkmController extends Controller
{
    /**
     * Menampilkan semua data UMKM.
     */
    public function index()
    {
        // Ambil UMKM (dengan kategori) yang statusnya 'active'
        $umkms = Umkm::with('category') // <-- DIPERBARUI: Eager load kategori
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($umkm) {
                // Ubah path gambar menjadi URL lengkap
                if ($umkm->hero_image) {
                    $umkm->hero_image = url(Storage::url($umkm->hero_image));
                }
                return $umkm;
            });

        return response()->json([
            'status' => true,
            'message' => 'Daftar UMKM berhasil diambil',
            'data' => $umkms
        ], 200);
    }

    /**
     * Menampilkan detail satu UMKM.
     */
    public function show($id)
    {
        $umkm = Umkm::with('category')->find($id); // <-- DIPERBARUI: Eager load kategori

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        // Ubah path gambar menjadi URL lengkap
        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail UMKM berhasil diambil',
            'data' => $umkm
        ], 200);
    }

    /**
     * Menyimpan UMKM baru.
     */
    public function store(Request $request)
    {
        // Daftar kecamatan sesuai enum di migrasi
        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id', // <-- DITAMBAHKAN
            'kecamatan' => ['nullable', Rule::in($listKecamatan)], // <-- DITAMBAHKAN
            'name' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'about' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        // Buat slug unik
        $slug = Str::slug($data['name']);
        $count = 1;
        while (Umkm::where('slug', $slug)->exists()) {
            $slug = Str::slug($data['name']) . '-' . $count;
            $count++;
        }
        $data['slug'] = $slug;

        // Handle upload gambar
        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('uploads/umkms', 'public');
            $data['hero_image'] = $path;
        }

        // Set status default
        $data['status'] = 'active';

        $umkm = Umkm::create($data);

        // Ambil data baru dengan kategori
        $umkm->load('category');

        // Ubah path gambar menjadi URL lengkap untuk respons
        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil dibuat',
            'data' => $umkm
        ], 201);
    }

    /**
     * Memperbarui data UMKM.
     */
    public function update(Request $request, $id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        // Daftar kecamatan sesuai enum di migrasi
        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'sometimes|required|exists:categories,id', // <-- DITAMBAHKAN
            'kecamatan' => ['sometimes', 'nullable', Rule::in($listKecamatan)], // <-- DITAMBAHKAN
            'name' => 'sometimes|required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'about' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
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

        // Handle update slug jika nama berubah
        if ($request->has('name') && $request->name !== $umkm->name) {
            $slug = Str::slug($data['name']);
            $count = 1;
            // Pastikan slug unik, tapi abaikan ID saat ini
            while (Umkm::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = Str::slug($data['name']) . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }

        // Handle update gambar
        if ($request->hasFile('hero_image')) {
            // Hapus gambar lama jika ada
            if ($umkm->hero_image && Storage::disk('public')->exists($umkm->hero_image)) {
                Storage::disk('public')->delete($umkm->hero_image);
            }

            // Simpan gambar baru
            $path = $request->file('hero_image')->store('uploads/umkms', 'public');
            $data['hero_image'] = $path;
        }

        $umkm->update($data);
        $umkm->refresh(); // Ambil data terbaru dari DB
        $umkm->load('category'); // Load relasi kategori

        // Ubah path gambar menjadi URL lengkap untuk respons
        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil diperbarui',
            'data' => $umkm
        ], 200);
    }

    /**
     * Menghapus UMKM (Soft Delete).
     */
    public function destroy($id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }
        
        // Load kategori sebelum mengubah data
        $umkm->load('category');

        // Cek apakah sudah inactive
        if ($umkm->status === 'inactive') {
            if ($umkm->hero_image) {
                $umkm->hero_image = url(Storage::url($umkm->hero_image));
            }
            return response()->json([
                'status' => false,
                'message' => 'UMKM sudah tidak aktif',
                'data' => $umkm
            ], 400);
        }

        // Lakukan soft delete
        $umkm->status = 'inactive';
        $umkm->save();
        $umkm->refresh();

        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil dinonaktifkan',
            'data' => $umkm
        ], 200);
    }
}