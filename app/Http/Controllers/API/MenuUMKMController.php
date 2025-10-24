<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MenuUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MenuUmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuUmkm::with('umkm');

        if ($request->has('umkm_id')) {
            $query->where('umkm_id', $request->umkm_id);
        }

        $menus = $query->where('status', 'active')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data menu berhasil diambil',
            'data' => $menus->map(function ($menu) {
                return [
                    'id' => $menu->id,
                    'umkm_id' => $menu->umkm_id,
                    'name_menu' => $menu->name_menu,
                    'category' => $menu->category,
                    'harga' => $menu->harga,
                    'status' => $menu->status,
                    'image_menu' => $menu->image_menu ? asset('storage/' . $menu->image_menu) : null, // 👈 Ctrl+Click langsung buka
                    'created_at' => $menu->created_at,
                    'updated_at' => $menu->updated_at,
                ];
            }),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'name_menu' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'image_menu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 👈 validasi gambar
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $path = null;
        if ($request->hasFile('image_menu')) {
            $path = $request->file('image_menu')->store('menu_images', 'public');
        }

        $menu = MenuUmkm::create([
            'umkm_id' => $request->umkm_id,
            'name_menu' => $request->name_menu,
            'category' => $request->category,
            'harga' => $request->harga,
            'status' => 'active',
            'image_menu' => $path,
        ])->fresh();

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil ditambahkan',
            'data' => [
                'id' => $menu->id,
                'umkm_id' => $menu->umkm_id,
                'name_menu' => $menu->name_menu,
                'category' => $menu->category,
                'harga' => $menu->harga,
                'status' => $menu->status,
                'image_menu' => $menu->image_menu ? asset('storage/' . $menu->image_menu) : null,
                'created_at' => $menu->created_at,
                'updated_at' => $menu->updated_at,
            ],
        ]);
    }

    public function show($id)
    {
        $menu = MenuUmkm::with('umkm')->find($id);

        if (!$menu) {
            return response()->json([
                'status' => false,
                'message' => 'Data menu tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail menu berhasil diambil',
            'data' => [
                'id' => $menu->id,
                'umkm_id' => $menu->umkm_id,
                'name_menu' => $menu->name_menu,
                'category' => $menu->category,
                'harga' => $menu->harga,
                'status' => $menu->status,
                'image_menu' => $menu->image_menu ? asset('storage/' . $menu->image_menu) : null,
                'created_at' => $menu->created_at,
                'updated_at' => $menu->updated_at,
            ],
        ]);
    }

    public function update(Request $request, $id)
    {
        $menu = MenuUmkm::find($id);

        if (!$menu) {
            return response()->json([
                'status' => false,
                'message' => 'Data menu tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name_menu' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'harga' => 'sometimes|numeric|min:0',
            'image_menu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('image_menu')) {
            if ($menu->image_menu && Storage::disk('public')->exists($menu->image_menu)) {
                Storage::disk('public')->delete($menu->image_menu);
            }
            $menu->image_menu = $request->file('image_menu')->store('menu_images', 'public');
        }

        $menu->update($request->only(['name_menu', 'category', 'harga']));

        return response()->json([
            'status' => true,
            'message' => 'Data menu berhasil diperbarui',
            'data' => [
                'id' => $menu->id,
                'umkm_id' => $menu->umkm_id,
                'name_menu' => $menu->name_menu,
                'category' => $menu->category,
                'harga' => $menu->harga,
                'status' => $menu->status,
                'image_menu' => $menu->image_menu ? asset('storage/' . $menu->image_menu) : null,
                'created_at' => $menu->created_at,
                'updated_at' => $menu->updated_at,
            ],
        ]);
    }

    public function destroy($id)
    {
        $menu = MenuUmkm::find($id);

        if (!$menu) {
            return response()->json([
                'status' => false,
                'message' => 'Data menu tidak ditemukan',
            ], 404);
        }

        // Hapus file (opsional)
        if ($menu->image_menu && Storage::disk('public')->exists($menu->image_menu)) {
            Storage::disk('public')->delete($menu->image_menu);
        }

        $menu->status = 'inactive';
        $menu->save();

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil dinonaktifkan (soft delete)',
            'data' => [
                'id' => $menu->id,
                'status' => $menu->status,
            ],
        ]);
    }

    public function getByUmkmId($umkm_id)
    {
        $menus = MenuUmkm::with('umkm')
            ->where('umkm_id', $umkm_id)
            ->where('status', 'active')
            ->get();

        if ($menus->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Menu untuk UMKM ini tidak ditemukan',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data menu untuk UMKM berhasil diambil',
            'data' => $menus->map(function ($menu) {
                return [
                    'id' => $menu->id,
                    'umkm_id' => $menu->umkm_id,
                    'name_menu' => $menu->name_menu,
                    'category' => $menu->category,
                    'harga' => $menu->harga,
                    'status' => $menu->status,
                    'image_menu' => $menu->image_menu ? asset('storage/' . $menu->image_menu) : null,
                    'created_at' => $menu->created_at,
                    'updated_at' => $menu->updated_at,
                ];
            }),
        ]);
    }
}
