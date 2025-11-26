<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GaleriUmkm;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GaleriUmkmController extends Controller
{
    private function transformGaleri($galeri)
    {
        if ($galeri && $galeri->image) {
            $galeri->image = url(Storage::url($galeri->image));
        }
        return $galeri;
    }

    public function trash()
    {
        $galeries = GaleriUmkm::where('status', 'inactive')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(fn($g) => $this->transformGaleri($g));

        return response()->json([
            'status' => true,
            'message' => 'Daftar galeri di sampah berhasil diambil',
            'data' => $galeries
        ], 200);
    }

    public function index()
    {
        $galeries = GaleriUmkm::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn($g) => $this->transformGaleri($g));

        return response()->json([
            'status' => true,
            'message' => 'Daftar galeri berhasil diambil',
            'data' => $galeries
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $umkmCheck = Umkm::find($request->umkm_id);
        if (!$umkmCheck || $umkmCheck->status !== 'active') {
            return response()->json(['status' => false, 'message' => 'UMKM tidak aktif'], 404);
        }

        $data = $validator->validated();
        $data['status'] = 'active';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/umkm', 'public');
        }

        $galeri = GaleriUmkm::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil dibuat',
            'data' => $this->transformGaleri($galeri)
        ], 201);
    }

    public function show($id)
    {
        $galeri = GaleriUmkm::find($id);

        if (!$galeri || $galeri->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Galeri tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail galeri berhasil diambil',
            'data' => $this->transformGaleri($galeri)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $galeri = GaleriUmkm::find($id);
        if (!$galeri) {
            return response()->json(['status' => false, 'message' => 'Galeri tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'umkm_id' => 'sometimes|exists:umkms,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            $data['image'] = $request->file('image')->store('uploads/umkm', 'public');
        }

        $galeri->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil diperbarui',
            'data' => $this->transformGaleri($galeri)
        ], 200);
    }

    public function destroy($id)
    {
        $galeri = GaleriUmkm::find($id);

        if (!$galeri) {
            return response()->json(['status' => false, 'message' => 'Galeri tidak ditemukan'], 404);
        }

        $galeri->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Galeri berhasil dinonaktifkan',
            'data' => $this->transformGaleri($galeri)
        ], 200);
    }

    public function getByUmkmId($umkm_id)
    {
        $umkm = Umkm::find($umkm_id);
        if (!$umkm || $umkm->status !== 'active') {
            return response()->json(['status' => false, 'message' => 'UMKM tidak ditemukan'], 404);
        }

        $galeries = GaleriUmkm::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn($g) => $this->transformGaleri($g));

        return response()->json([
            'status' => true,
            'message' => 'Galeri berdasarkan UMKM berhasil diambil',
            'data' => $galeries
        ], 200);
    }
}
