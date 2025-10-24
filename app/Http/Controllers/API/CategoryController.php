<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get()->map(function ($category) {
            if ($category->icon) {
                $category->icon = url(Storage::url($category->icon));
            }
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

        if ($category->icon) {
            $category->icon = url(Storage::url($category->icon));
        }

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

        // Set default status active
        $data['status'] = 'active';

        $category = Category::create($data);
        $category->refresh(); // Pastikan status dan field lain muncul dari DB

        if ($category->icon) {
            $category->icon = url(Storage::url($category->icon));
        }

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
        $category->refresh(); // Ambil ulang data termasuk status

        if ($category->icon) {
            $category->icon = url(Storage::url($category->icon));
        }

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
            if ($category->icon && !str_starts_with($category->icon, 'http')) {
                $category->icon = asset('storage/' . $category->icon);
            }

            return response()->json([
                'status' => false,
                'message' => 'Kategori sudah tidak aktif',
                'data' => $category
            ], 400);
        }

        $category->status = 'inactive';
        $category->save();
        $category->refresh();

        if ($category->icon && !str_starts_with($category->icon, 'http')) {
            $category->icon = asset('storage/' . $category->icon);
        }

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil dinonaktifkan',
            'data' => $category
        ], 200);
    }
}
