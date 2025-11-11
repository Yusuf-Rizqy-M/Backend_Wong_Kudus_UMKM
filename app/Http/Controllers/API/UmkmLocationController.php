<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\UmkmLocation;

class UmkmLocationController extends Controller
{
    public function index()
    {
        $locations = UmkmLocation::where('status', 'active')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data lokasi berhasil diambil',
            'data' => $locations
        ], 200);
    }

    public function show($umkm_id)
    {
        $location = UmkmLocation::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->first();

        if (!$location) {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail lokasi berhasil diambil',
            'data' => $location
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'umkm_id' => 'required|exists:umkms,id',
            'address' => 'required|string',
            'full_address' => 'required|string',
            'maps_url' => 'nullable|string|url',
            'embed_url' => 'nullable|string',
        ]);

        // Cek apakah UMKM sudah punya lokasi aktif
        $existing = UmkmLocation::where('umkm_id', $validatedData['umkm_id'])
            ->where('status', 'active')
            ->first();

        if ($existing) {
            return response()->json([
                'status' => false,
                'message' => 'UMKM ini sudah memiliki lokasi aktif. Tidak dapat menambahkan lokasi baru.'
            ], 409);
        }

        $validatedData['status'] = 'active';
        $location = UmkmLocation::create($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Lokasi berhasil ditambahkan',
            'data' => $location
        ], 201);
    }

    public function update(Request $request, $umkm_id)
    {
        $validatedData = $request->validate([
            'address' => 'nullable|string',
            'full_address' => 'nullable|string',
            'maps_url' => 'nullable|string|url',
            'embed_url' => 'nullable|string',
        ]);

        $location = UmkmLocation::where('umkm_id', $umkm_id)->first();

        if (!$location) {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi tidak ditemukan'
            ], 404);
        }

        $validatedData['status'] = 'active';
        $location->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Lokasi berhasil diperbarui',
            'data' => $location
        ], 200);
    }

    public function destroy($id)
    {
        $location = UmkmLocation::find($id);

        if (!$location) {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi tidak ditemukan',
                'data' => null
            ], 404);
        }

        // Jika sudah nonaktif, kembalikan respons bahwa data sudah tidak aktif
        if ($location->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi sudah tidak aktif',
                'data' => $location
            ], 400);
        }

        // Nonaktifkan lokasi
        $location->status = 'inactive';
        $location->save();
        $location->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Lokasi berhasil dinonaktifkan',
            'data' => $location
        ], 200);
    }
   public function activate($id)
    {
        $location = UmkmLocation::find($id);

        if (!$location) {
            return response()->json([
                'status' => false,
                'message' => 'Lokasi tidak ditemukan',
            ], 404);
        }

        $location->status = 'active';
        $location->save();

        return response()->json([
            'status' => true,
            'message' => 'Lokasi berhasil diaktifkan',
            'data' => $location,
        ]);
    }
}
