<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UmkmListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UmkmListingController extends Controller
{
    /**
     * Helper untuk mengubah path gambar menjadi URL
     */
    private function getImageUrl($listing)
    {
        if ($listing->image) {
            $listing->image = url(Storage::url($listing->image));
        }
        return $listing;
    }

    /**
     * Menampilkan semua listing yang 'active'.
     */
    public function index()
    {
        $listings = UmkmListing::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($listing) {
                return $this->getImageUrl($listing);
            });

        return response()->json([
            'status' => true,
            'message' => 'Daftar listing berhasil diambil',
            'data' => $listings
        ], 200);
    }

    /**
     * Menyimpan data listing baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'umkm_id' harus unik di tabel 'umkm_listings'
            'umkm_id' => 'required|exists:umkms,id|unique:umkm_listings,umkm_id',
            'category' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'kecamatan_slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            $path = $request->file('image')->store('uploads/listings', 'public');
            $data['image'] = $path;
        }

        $listing = UmkmListing::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil dibuat',
            'data' => $this->getImageUrl($listing)
        ], 201);
    }

    /**
     * Menampilkan detail satu listing.
     */
    public function show($id)
    {
        $listing = UmkmListing::find($id);

        if (!$listing) {
            return response()->json([
                'status' => false,
                'message' => 'Listing tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail listing berhasil diambil',
            'data' => $this->getImageUrl($listing)
        ], 200);
    }

    /**
     * Memperbarui data listing.
     */
    public function update(Request $request, $id)
    {
        $listing = UmkmListing::find($id);
        if (!$listing) {
            return response()->json([
                'status' => false,
                'message' => 'Listing tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            // Validasi unik, tapi abaikan ID umkm_id saat ini
            'umkm_id' => 'sometimes|required|exists:umkms,id|unique:umkm_listings,umkm_id,' . $listing->id,
            'category' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'kecamatan_slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            if ($listing->image && Storage::disk('public')->exists($listing->image)) {
                Storage::disk('public')->delete($listing->image);
            }
            // Simpan gambar baru
            $path = $request->file('image')->store('uploads/listings', 'public');
            $data['image'] = $path;
        }

        $listing->update($data);
        $listing->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil diperbarui',
            'data' => $this->getImageUrl($listing)
        ], 200);
    }

    /**
     * Menghapus listing (Soft Delete).
     */
    public function destroy($id)
    {
        $listing = UmkmListing::find($id);

        if (!$listing) {
            return response()->json([
                'status' => false,
                'message' => 'Listing tidak ditemukan',
            ], 404);
        }

        if ($listing->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Listing sudah tidak aktif',
            ], 400);
        }

        $listing->status = 'inactive';
        $listing->save();
        $listing->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil dinonaktifkan',
            'data' => $this->getImageUrl($listing)
        ], 200);
    }
}