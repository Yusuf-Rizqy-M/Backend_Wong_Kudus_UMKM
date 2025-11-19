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
    public function totalArticles()
    {
        $total = ArticleBlog::count();

        return response()->json([
            'total_articles' => $total,
            'message' => "Terdapat $total artikel blog di database."
        ]);
    }

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

        // LOG ACTIVITY setelah berhasil create
        logActivity(
            'admin',
            "Menambahkan artikel baru: {$article->title}",
            'create',
            $article->id,
            'article_blogs'
        );

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

        // LOG ACTIVITY setelah update
        logActivity(
            'admin',
            "Mengupdate artikel: {$article->title}",
            'update',
            $article->id,
            'article_blogs'
        );

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

        // LOG ACTIVITY setelah menonaktifkan
        logActivity(
            'admin',
            "Menonaktifkan artikel: {$article->title}",
            'delete',
            $article->id,
            'article_blogs'
        );

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

        $articles = ArticleBlog::where('category_blog_id', $id)
            ->where('status', 'active')
            ->get()
            ->map(function ($article) {
                if ($article->image) {
                    $article->image = url(Storage::url($article->image));
                }
                return $article;
            });

        if ($articles->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada artikel untuk kategori ini.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil diambil.',
            'data' => $articles
        ], 200);
    }

    public function showDetail($id)
    {
        $article = ArticleBlog::with('categoryBlog')
            ->where('id', $id)
            ->where('status', 'active')
            ->first();

        if (!$article) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan atau tidak aktif.',
                'data' => null
            ], 404);
        }

        if ($article->image) {
            $article->image = url(Storage::url($article->image));
        }

        $categoryName = $article->categoryBlog?->title ?? 'Lainnya';

        $relatedArticles = ArticleBlog::where('category_blog_id', $article->category_blog_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'active')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->map(function ($item) {
                if ($item->image) {
                    $item->image = url(Storage::url($item->image));
                }
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'image' => $item->image,
                    'author' => $item->author,
                    'created_at' => $item->created_at,
                    'category_blog_id' => $item->category_blog_id,
                ];
            });

        return response()->json([
            'status' => true,
            'message' => 'Detail artikel berhasil diambil.',
            'data' => [
                'article' => [
                    'id' => $article->id,
                    'title' => $article->title,
                    'content' => $article->content,
                    'image' => $article->image,
                    'author' => $article->author,
                    'created_at' => $article->created_at,
                    'category' => $categoryName,
                    'category_blog_id' => $article->category_blog_id,
                ],
                'related_articles' => $relatedArticles,
            ]
        ], 200);
    }
}
