<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UmkmListing;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UmkmListingController extends Controller
{
    private function transformListing($listing)
    {
        if ($listing && $listing->image) {
            $listing->image = url(Storage::url($listing->image));
        }
        return $listing;
    }

    public function index()
    {
        $listings = UmkmListing::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn($l) => $this->transformListing($l));

        return response()->json([
            'status' => true,
            'message' => 'Daftar listing berhasil diambil',
            'data' => $listings
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
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

        $umkm = Umkm::find($data['umkm_id']);
        if (!$umkm || $umkm->status !== 'active') {
            return response()->json(['status' => false, 'message' => 'UMKM tidak aktif'], 404);
        }

        if ($data['location'] && $data['location'] !== $umkm->kecamatan) {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi harus sama dengan kecamatan UMKM: ' . $umkm->kecamatan
            ], 422);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/umkm', 'public');
        }

        $existing = UmkmListing::where('umkm_id', $data['umkm_id'])->first();

        if ($existing) {
            if ($request->hasFile('image') && $existing->image) {
                if (Storage::disk('public')->exists($existing->image)) {
                    Storage::disk('public')->delete($existing->image);
                }
            }

            $data['status'] = 'active';
            $existing->update($data);

            return response()->json([
                'status' => true,
                'message' => 'Listing berhasil diperbarui dan diaktifkan',
                'data' => $this->transformListing($existing)
            ], 200);
        }

        $data['status'] = 'active';
        $listing = UmkmListing::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil dibuat',
            'data' => $this->transformListing($listing)
        ], 201);
    }

    public function show($id)
    {
        $listing = UmkmListing::find($id);

        if (!$listing || $listing->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Listing tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail listing berhasil diambil',
            'data' => $this->transformListing($listing)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $listing = UmkmListing::find($id);
        if (!$listing) {
            return response()->json(['status' => false, 'message' => 'Listing tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'umkm_id' => 'sometimes|exists:umkms,id',
            'category' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'kecamatan_slug' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        if (isset($data['umkm_id']) && $data['umkm_id'] != $listing->umkm_id) {
            $cekDuplicate = UmkmListing::where('umkm_id', $data['umkm_id'])->where('id', '!=', $id)->exists();
            if ($cekDuplicate) {
                return response()->json(['status' => false, 'message' => 'UMKM ID sudah digunakan di listing lain'], 409);
            }
        }

        if (isset($data['location'])) {
            $umkmId = $data['umkm_id'] ?? $listing->umkm_id;
            $umkm = Umkm::find($umkmId);
            if ($umkm && $data['location'] !== $umkm->kecamatan) {
                return response()->json(['status' => false, 'message' => 'Lokasi harus sama dengan kecamatan UMKM: ' . $umkm->kecamatan], 422);
            }
        }

        if ($request->hasFile('image')) {
            if ($listing->image && Storage::disk('public')->exists($listing->image)) {
                Storage::disk('public')->delete($listing->image);
            }
            $data['image'] = $request->file('image')->store('uploads/umkm', 'public');
        }

        $listing->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil diperbarui',
            'data' => $this->transformListing($listing)
        ], 200);
    }

    public function destroy($id)
    {
        $listing = UmkmListing::find($id);

        if (!$listing) {
            return response()->json(['status' => false, 'message' => 'Listing tidak ditemukan'], 404);
        }

        $listing->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Listing berhasil dinonaktifkan',
            'data' => $this->transformListing($listing)
        ], 200);
    }
}
