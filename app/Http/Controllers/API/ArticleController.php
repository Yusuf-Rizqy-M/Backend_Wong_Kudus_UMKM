<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ArticleBlog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = ArticleBlog::where('status', 'active')->get()->map(function ($article) {
            if ($article->image) {
                $article->image = url(Storage::url($article->image));
            }
            return $article;
        });

        return response()->json([
            'status' => true,
            'message' => 'Daftar artikel berhasil diambil',
            'data' => $articles
        ], 200);
    }

    public function show($id)
    {
        $article = ArticleBlog::find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($article->image) {
            $article->image = url(Storage::url($article->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail artikel berhasil diambil',
            'data' => $article
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_blog_id' => 'required|exists:category_blogs,id',
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/articles', 'public');
        }

        $data['status'] = 'active';

        $article = ArticleBlog::create($data);

        if ($article->image) {
            $article->image = url(Storage::url($article->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil dibuat',
            'data' => $article
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $article = ArticleBlog::find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'category_blog_id' => 'sometimes|required|exists:category_blogs,id',
            'author' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('uploads/articles', 'public');
        }

        $article->update($data);

        if ($article->image) {
            $article->image = url(Storage::url($article->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil diperbarui',
            'data' => $article
        ], 200);
    }

    public function destroy($id)
    {
        $article = ArticleBlog::find($id);

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($article->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Artikel sudah tidak aktif',
                'data' => $article
            ], 400);
        }

        $article->status = 'inactive';
        $article->save();

        if ($article->image) {
            $article->image = url(Storage::url($article->image));
        }

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil dinonaktifkan',
            'data' => $article
        ], 200);
    }
    public function getArticlesByCategory($id)
    {
        $category = CategoryBlog::where('id', $id)->where('status', 'active')->first();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan.',
                'data' => []
            ], 404);
        }

        $articles = ArticleBlog::where('category_blog_id', $id)->where('status', 'active')->get()->map(function ($article) {
            if ($article->image) {
                $article->image = url(Storage::url($article->image));
            }
            return $article;
        });

        if ($articles->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada artikel yang ditemukan untuk kategori ini.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil diambil.',
            'data' => $articles
        ], 200);
    }
}
