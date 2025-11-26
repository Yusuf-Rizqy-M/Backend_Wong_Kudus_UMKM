<?php

namespace App\Http\Controllers\API;

use App\Models\UmkmMenu;
use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class UmkmMenuController extends Controller
{
    private function transformMenu($menu)
    {
        if ($menu && $menu->image) {
            $menu->image = url(Storage::url($menu->image));
        }
        return $menu;
    }

    public function index()
    {
        $menus = UmkmMenu::where('status', 'active')
            ->latest()
            ->get()
            ->map(fn($m) => $this->transformMenu($m));

        return response()->json([
            'status' => true,
            'message' => 'Data menu berhasil diambil',
            'data' => $menus
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'umkm_id' => 'required|exists:umkms,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);

            $umkm = Umkm::find($validatedData['umkm_id']);
            if (!$umkm || $umkm->status !== 'active') {
                 return response()->json([
                    'status' => false,
                    'message' => 'UMKM tidak ditemukan atau sedang tidak aktif. Tidak dapat menambahkan menu.'
                ], 404);
            }

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('uploads/umkm', 'public');
                $validatedData['image'] = $path;
            }

            $validatedData['status'] = 'active';
            $menu = UmkmMenu::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Menu berhasil ditambahkan',
                'data' => $this->transformMenu($menu)
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        $umkmMenu = UmkmMenu::find($id);

        if (!$umkmMenu || $umkmMenu->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail menu berhasil diambil',
            'data' => $this->transformMenu($umkmMenu)
        ], 200);
    }

    public function getByUmkm($umkm_id)
    {
        $umkm = Umkm::find($umkm_id);
        if (!$umkm || $umkm->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan'
            ], 404);
        }

        $menus = UmkmMenu::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->latest()
            ->get()
            ->map(fn($m) => $this->transformMenu($m));

        return response()->json([
            'status' => true,
            'message' => 'Data menu by UMKM berhasil diambil',
            'data' => $menus
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $umkmMenu = UmkmMenu::find($id);

        if (!$umkmMenu) {
             return response()->json([
                'status' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        try {
            $validatedData = $request->validate([
                'umkm_id' => 'sometimes|exists:umkms,id',
                'name' => 'sometimes|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'status' => 'sometimes|in:active,inactive'
            ]);

            if ($request->hasFile('image')) {
                if ($umkmMenu->image && Storage::disk('public')->exists($umkmMenu->image)) {
                    Storage::disk('public')->delete($umkmMenu->image);
                }
                $path = $request->file('image')->store('uploads/umkm', 'public');
                $validatedData['image'] = $path;
            }

            $umkmMenu->update($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Menu berhasil diperbarui',
                'data' => $this->transformMenu($umkmMenu)
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy($id)
    {
        $umkmMenu = UmkmMenu::find($id);

        if (!$umkmMenu) {
             return response()->json([
                'status' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $umkmMenu->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil dinonaktifkan (Soft Delete)'
        ], 200);
    }
}
