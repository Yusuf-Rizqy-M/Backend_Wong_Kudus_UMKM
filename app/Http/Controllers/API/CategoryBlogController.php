<?php

namespace App\Http\Controllers\API;

use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryBlogController extends Controller
{
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        if (CategoryBlog::where('title', $request->title)->where('status', 'active')->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'Judul kategori tersebut sudah ada.',
            ], 409);
        }

        $category = CategoryBlog::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'active',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil dibuat.',
            'data' => $category,
        ], 201);
    }

    public function getCategory($id)
    {
        $category = CategoryBlog::where('id', $id)->where('status', 'active')->first();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil ditemukan.',
            'data' => $category
        ], 200);
    }

    public function getCategories()
    {
        $categories = CategoryBlog::where('status', 'active')->get();

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada kategori yang ditemukan.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil diambil.',
            'data' => $categories
        ], 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = CategoryBlog::where('id', $id)->where('status', 'active')->first();
        if (!$category) {
            return response()->json(['status' => false, 'message' => 'Kategori tidak ditemukan.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        if ($request->filled('title')) {
            $category->title = $request->title;
        }
        if ($request->filled('description')) {
            $category->description = $request->description;
        }

        $category->save();

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil diubah.',
            'data' => $category,
        ]);
    }

    public function deleteCategory($id)
    {
        $category = CategoryBlog::where('id', $id)->where('status', 'active')->first();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan.'
            ], 404);
        }

        if ($category->articles()->where('status', 'active')->count() > 0) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak dapat dihapus karena masih memiliki artikel terkait.'
            ], 409);
        }

        $category->status = 'inactive';
        $category->save();

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil dinonaktifkan.'
        ]);
    }

    private function validationErrorResponse($validator)
    {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'data' => $validator->errors(),
        ], 422);
    }
}