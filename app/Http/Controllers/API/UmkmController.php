<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UmkmController extends Controller
{
    /**
     * Daftar semua relasi untuk di-load.
     * Kita buat variabel agar tidak berulang-ulang mengetik.
     */
    protected $relations = [
        'category',
        'gallery', // <-- REVISI: Sesuai nama fungsi baru di model
        'openingHours',
        'listing',
        'location',
        'contact',
        'menus'
    ];

    /**
     * Fungsi helper untuk mengubah semua path gambar menjadi URL.
     * Ini untuk menghindari duplikasi kode di setiap method.
     */
    protected function transformUmkmUrls($umkm)
    {
        // 1. Handle hero_image utama
        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        // 2. Handle relasi gallery (asumsi kolom 'image')
        if ($umkm->gallery) {
            foreach ($umkm->gallery as $item) {
                if ($item->image) {
                    $item->image = url(Storage::url($item->image));
                }
            }
        }

        // 3. Handle relasi menus (asumsi kolom 'file')
        if ($umkm->menus) {
            foreach ($umkm->menus as $menu) {
                if ($menu->file) { // Asumsi dari seeder Anda, kolomnya 'file'
                    $menu->file = url(Storage::url($menu->file));
                }
            }
        }
        
        // 4. Handle relasi category (asumsi kolom 'icon')
        if ($umkm->category && $umkm->category->icon) {
             $umkm->category->icon = url(Storage::url($umkm->category->icon));
        }

        return $umkm;
    }

    /**
     * Menampilkan semua data UMKM.
     */
    public function index()
    {
        $umkms = Umkm::with($this->relations) // <-- REVISI: Load semua relasi
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($umkm) {
                // <-- REVISI: Gunakan helper function
                return $this->transformUmkmUrls($umkm);
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
        // <-- REVISI: Load semua relasi
        $umkm = Umkm::with($this->relations)->find($id);

        if (!$umkm) {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan',
                'data' => null
            ], 404);
        }

        // <-- REVISI: Gunakan helper function
        $this->transformUmkmUrls($umkm);

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
        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'kecamatan' => ['nullable', Rule::in($listKecamatan)],
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
            $path = $request->file('hero_image')->store('uploads/umkm', 'public');
            $data['hero_image'] = $path;
        }

        $data['status'] = 'active';

        $umkm = Umkm::create($data);

        // Ambil data baru dengan SEMUA relasi
        // Relasi baru (gallery, menu, dll) akan jadi array kosong, dan ini benar.
        $umkm->load($this->relations); // <-- REVISI

        // Ubah path gambar menjadi URL lengkap untuk respons
        $this->transformUmkmUrls($umkm); // <-- REVISI

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

        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'sometimes|required|exists:categories,id',
            'kecamatan' => ['sometimes', 'nullable', Rule::in($listKecamatan)],
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
            while (Umkm::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = Str::slug($data['name']) . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }

        // Handle update gambar
        if ($request->hasFile('hero_image')) {
            if ($umkm->hero_image && Storage::disk('public')->exists($umkm->hero_image)) {
                Storage::disk('public')->delete($umkm->hero_image);
            }
            $path = $request->file('hero_image')->store('uploads/umkm', 'public');
            $data['hero_image'] = $path;
        }

        $umkm->update($data);
        $umkm->refresh(); 
        $umkm->load($this->relations); // <-- REVISI: Load semua relasi

        // Ubah path gambar menjadi URL lengkap untuk respons
        $this->transformUmkmUrls($umkm); // <-- REVISI

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
        
        // Load semua relasi sebelum mengubah data
        $umkm->load($this->relations); // <-- REVISI

        // Cek apakah sudah inactive
        if ($umkm->status === 'inactive') {
            $this->transformUmkmUrls($umkm); // <-- REVISI
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

        $this->transformUmkmUrls($umkm); // <-- REVISI

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil dinonaktifkan',
            'data' => $umkm
        ], 200);
    }
}