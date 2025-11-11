<?php

namespace App\Http\Controllers\API;
use App\Models\UmkmMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Storage; 

class UmkmMenuController extends Controller
{
    public function index()
    {
        $menus = UmkmMenu::where('status', 'active')->latest()->get()->map(function ($menu) {
            if ($menu->image) {
                $menu->image = url(Storage::url($menu->image));
            }
            return $menu;
        });

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
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('menu_images', 'public');
                $validatedData['image'] = $path;
            }

            $validatedData['status'] = 'active';

            $menu = UmkmMenu::create($validatedData);
            
            $menu->refresh(); 
            if ($menu->image) {
                $menu->image = url(Storage::url($menu->image));
            }

            return response()->json([
                'status' => true,
                'message' => 'Menu berhasil ditambahkan',
                'data' => $menu 
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show(UmkmMenu $umkmMenu)
    {
        if ($umkmMenu->status != 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        if ($umkmMenu->image) {
            $umkmMenu->image = url(Storage::url($umkmMenu->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail menu berhasil diambil',
            'data' => $umkmMenu
        ], 200);
    }

    // --- FUNGSI BARU DITAMBAHKAN ---
    /**
     * Mengambil semua menu aktif berdasarkan ID UMKM.
     */
    public function getByUmkm($umkm_id)
    {
        // Cari semua menu dengan umkm_id yang sesuai dan status 'active'
        $menus = UmkmMenu::where('umkm_id', $umkm_id)
                          ->where('status', 'active')
                          ->latest()
                          ->get()
                          ->map(function ($menu) {
            // Ubah path gambar menjadi URL lengkap
            if ($menu->image) {
                $menu->image = url(Storage::url($menu->image));
            }
            return $menu;
        });

        // Cek jika UMKM ada tapi tidak punya menu, akan mengembalikan array kosong []. Ini normal.
        
        return response()->json([
            'status' => true,
            'message' => 'Data menu by UMKM berhasil diambil',
            'data' => $menus
        ], 200);
    }
    // --- AKHIR FUNGSI BARU ---


    public function update(Request $request, UmkmMenu $umkmMenu)
    {
        try {
            $validatedData = $request->validate([
                'umkm_id' => 'required|exists:umkms,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($umkmMenu->image) {
                    // Cek dulu apakah path-nya adalah URL lengkap atau path relatif
                    // Karena accessor mungkin sudah mengubahnya
                    $oldMenuData = $umkmMenu->getOriginal();
                    if ($oldMenuData['image'] && Storage::disk('public')->exists($oldMenuData['image'])) {
                        Storage::disk('public')->delete($oldMenuData['image']);
                    }
                }
                
                // Simpan gambar baru
                $path = $request->file('image')->store('menu_images', 'public');
                $validatedData['image'] = $path;
            }

            $umkmMenu->update($validatedData);

            $umkmMenu->refresh(); 
            if ($umkmMenu->image) {
                $umkmMenu->image = url(Storage::url($umkmMenu->image));
            }

            return response()->json([
                'status' => true,
                'message' => 'Menu berhasil diperbarui',
                'data' => $umkmMenu
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy(UmkmMenu $umkmMenu)
    {
        $umkmMenu->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil dihapus (non-aktif)'
        ], 200);
    }
}