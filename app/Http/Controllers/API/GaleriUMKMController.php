<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GaleriUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GaleriUmkmController extends Controller
{

    public function index(Request $request)
    {
        $query = GaleriUmkm::with('umkm');

        if ($request->has('umkm_id')) {
            $query->where('umkm_id', $request->umkm_id);
        }

        $galeri = $query->get()->map(function ($item) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                $item->image = asset('storage/' . $item->image);
            }
            return $item;
        });

        return response()->json([
            'status' => true,
            'message' => 'Data galeri berhasil diambil',
            'data' => $galeri
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'name' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $path = $request->file('image')->store('galeri_umkm', 'public');

        $galeri = GaleriUmkm::create([
            'umkm_id' => $request->umkm_id,
            'name' => $request->name,
            'image' => $path,
        ]);

        $galeri->image = asset('storage/' . $galeri->image);

        return response()->json([
            'status' => true,
            'message' => 'Gambar galeri berhasil ditambahkan',
            'data' => $galeri
        ]);
    }

    public function show($id)
    {
        $galeri = GaleriUmkm::with('umkm')->find($id);

        if (!$galeri) {
            return response()->json([
                'status' => false,
                'message' => 'Data galeri tidak ditemukan',
            ], 404);
        }

        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            $galeri->image = asset('storage/' . $galeri->image);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail galeri berhasil diambil',
            'data' => $galeri
        ]);
    }

    public function update(Request $request, $id)
    {
        $galeri = GaleriUmkm::find($id);

        if (!$galeri) {
            return response()->json([
                'status' => false,
                'message' => 'Data galeri tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }

            $galeri->image = $request->file('image')->store('galeri_umkm', 'public');
        }

        if ($request->filled('name')) {
            $galeri->name = $request->name;
        }

        $galeri->save();

        $galeri->image = asset('storage/' . $galeri->image);

        return response()->json([
            'status' => true,
            'message' => 'Data galeri berhasil diperbarui',
            'data' => $galeri
        ]);
    }


   public function destroy($id)
{
    $galeri = GaleriUmkm::find($id);

    if (!$galeri) {
        return response()->json([
            'status' => false,
            'message' => 'Data galeri tidak ditemukan',
        ], 404);
    }

    $galeri->status = 'inactive';
    $galeri->save();

    if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
        Storage::disk('public')->delete($galeri->image);
    }

    return response()->json([
        'status' => true,
        'message' => 'Galeri berhasil dinonaktifkan',
        'data' => [
            'id' => $galeri->id,
            'status' => $galeri->status,
        ],
    ]);
}

    public function getByUmkmId($umkm_id)
    {
        $galeri = GaleriUmkm::with('umkm')
            ->where('umkm_id', $umkm_id)
            ->get()
            ->map(function ($item) {
                if ($item->image && Storage::disk('public')->exists($item->image)) {
                    $item->image = asset('storage/' . $item->image);
                }
                return $item;
            });

        if ($galeri->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Galeri untuk UMKM ini tidak ditemukan',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data galeri untuk UMKM berhasil diambil',
            'data' => $galeri,
        ]);
    }
}
