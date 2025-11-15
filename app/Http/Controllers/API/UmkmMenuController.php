<?php

namespace App\Http\Controllers\API;

use App\Models\UmkmMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class UmkmMenuController extends Controller
{
    /**
     * Helper untuk convert image path → full URL
     */
    private function getImageUrl($menu)
    {
        if ($menu->image) {
            $menu->image = url(Storage::url($menu->image));
        }
        return $menu;
    }

    /**
     * Menampilkan semua menu aktif
     */
    public function index()
    {
        $menus = UmkmMenu::where('status', 'active')
            ->latest()
            ->get()
            ->map(fn($m) => $this->getImageUrl($m));

        return response()->json([
            'status' => true,
            'message' => 'Data menu berhasil diambil',
            'data' => $menus
        ], 200);
    }

    /**
     * Menambah menu baru
     */
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

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('uploads/umkm', 'public');
                $validatedData['image'] = $path;
            }

            $validatedData['status'] = 'active';
            $menu = UmkmMenu::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'Menu berhasil ditambahkan',
                'data' => $this->getImageUrl($menu)
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Menampilkan detail menu
     */
    public function show(UmkmMenu $umkmMenu)
    {
        if ($umkmMenu->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail menu berhasil diambil',
            'data' => $this->getImageUrl($umkmMenu)
        ], 200);
    }

    /**
     * Menampilkan menu berdasarkan UMKM
     */
    public function getByUmkm($umkm_id)
    {
        $menus = UmkmMenu::where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->latest()
            ->get()
            ->map(fn($m) => $this->getImageUrl($m));

        return response()->json([
            'status' => true,
            'message' => 'Data menu by UMKM berhasil diambil',
            'data' => $menus
        ], 200);
    }

    /**
     * Update menu
     */
    public function update(Request $request, UmkmMenu $umkmMenu)
    {
        try {
            $validatedData = $request->validate([
                'umkm_id' => 'required|exists:umkms,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
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
                'data' => $this->getImageUrl($umkmMenu)
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Soft delete menu
     */
    public function destroy(UmkmMenu $umkmMenu)
    {
        if ($umkmMenu->image && Storage::disk('public')->exists($umkmMenu->image)) {
            Storage::disk('public')->delete($umkmMenu->image);
        }

        $umkmMenu->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil dihapus (non-aktif)'
        ], 200);
    }
}
