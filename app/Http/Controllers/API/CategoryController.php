<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function totalCategories()
    {
        $total = Category::count();

        return response()->json([
            'total_categories' => $total
        ]);
    }

    public function indexWithUmkm()
    {
        try {
            $categories = Category::with([
                'umkms' => function ($query) {
                    $query->where('status', 'active')
                        ->with(['gallery', 'openingHours', 'menus', 'location', 'contact'])
                        ->orderBy('id');
                }
            ])
                ->where('status', 'active')
                ->orderBy('id')
                ->get()
                ->map(function ($category) {
                    $category->icon = $this->fixUrl($category->icon);

                    $category->data_umkm = $category->umkms->map(function ($umkm) {
                        $umkm->hero_image = $this->fixUrl($umkm->hero_image);

                        $umkm->gallery = $umkm->gallery->map(function ($img) {
                            $img->image = $this->fixUrl($img->image);
                            return $img;
                        });

                        $umkm->menus = $umkm->menus->map(function ($menu) {
                            $menu->image = $this->fixUrl($menu->image);
                            return $menu;
                        });

                        return $umkm;
                    });

                    unset($category->umkms);
                    return $category;
                });

            return response()->json([
                'status' => true,
                'message' => 'Daftar kategori dengan UMKM berhasil diambil',
                'data' => $categories
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    private function fixUrl($path)
    {
        if (!$path) return null;
        if (str_starts_with($path, 'http')) return $path;
        return url(Storage::url($path));
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get()->map(function ($category) {
            $category->icon = $this->fixUrl($category->icon);
            return $category;
        });

        return response()->json([
            'status' => true,
            'message' => 'Daftar kategori berhasil diambil',
            'data' => $categories
        ], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }

        $category->icon = $this->fixUrl($category->icon);

        return response()->json([
            'status' => true,
            'message' => 'Detail kategori berhasil diambil',
            'data' => $category
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('uploads/categories', 'public');
            $data['icon'] = $path;
        }

        $data['status'] = 'active';

        $category = Category::create($data);

        // 🔥 LOG AKTIVITAS CREATE
        logActivity(
            'admin',
            'Admin membuat kategori ' . $category->name,
            'create',
            $category->id,
            'categories'
        );

        $category->icon = $this->fixUrl($category->icon);

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil dibuat',
            'data' => $category
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

        if ($request->hasFile('icon')) {
            if ($category->icon && Storage::disk('public')->exists($category->icon)) {
                Storage::disk('public')->delete($category->icon);
            }

            $path = $request->file('icon')->store('uploads/categories', 'public');
            $data['icon'] = $path;
        }

        $category->update($data);

        // 🔥 LOG AKTIVITAS UPDATE
        logActivity(
            'admin',
            'Admin memperbarui kategori ' . $category->name,
            'update',
            $category->id,
            'categories'
        );

        $category->icon = $this->fixUrl($category->icon);

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil diperbarui',
            'data' => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($category->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Kategori sudah tidak aktif',
                'data' => $category
            ], 400);
        }

        $category->status = 'inactive';
        $category->save();

        // 🔥 LOG AKTIVITAS DELETE / DEACTIVATE
        logActivity(
            'admin',
            'Admin menonaktifkan kategori ' . $category->name,
            'delete',
            $category->id,
            'categories'
        );

        $category->icon = $this->fixUrl($category->icon);

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil dinonaktifkan',
            'data' => $category
        ], 200);
    }
}
