<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RatingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RatingWebsiteController extends Controller
{
    public function totalRating()
    {
        $total = RatingWebsite::count();

        return response()->json([
            'total_rating' => $total,
            'message' => "Terdapat $total rating untuk website."
        ]);
    }

    public function index()
    {
        $ratings = RatingWebsite::orderBy('created_at', 'desc')->get()->map(function ($rating) {
            if ($rating->photo_profil) {
                $rating->photo_profil = url(Storage::url($rating->photo_profil));
            }
            return $rating;
        });

        return response()->json([
            'status' => true,
            'message' => 'Daftar rating berhasil diambil.',
            'data' => $ratings
        ], 200);
    }

    public function show($id)
    {
        $rating = RatingWebsite::find($id);

        if (!$rating) {
            return response()->json([
                'status' => false,
                'message' => 'Rating tidak ditemukan.',
                'data' => null
            ], 404);
        }

        if ($rating->photo_profil) {
            $rating->photo_profil = url(Storage::url($rating->photo_profil));
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail rating berhasil diambil.',
            'data' => $rating
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'name_last' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'rating' => 'required|numeric|min:0|max:5',
            'photo_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'comment' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        if ($request->hasFile('photo_profil')) {
            $data['photo_profil'] = $request->file('photo_profil')->store('uploads/rating_photos', 'public');
        }

        $rating = RatingWebsite::create($data);

        if ($rating->photo_profil) {
            $rating->photo_profil = url(Storage::url($rating->photo_profil));
        }

        // 🔥 CATAT AKTIVITAS
        logActivity(
            'user',
            'User memberikan rating ' . $rating->rating,
            'rating',
            $rating->id,
            'rating_websites'
        );

        return response()->json([
            'status' => true,
            'message' => 'Rating berhasil dikirim.',
            'data' => $rating
        ], 201);
    }

    public function average()
    {
        $ratings = RatingWebsite::select('rating', DB::raw('COUNT(*) as total'))
            ->groupBy('rating')
            ->get();

        if ($ratings->isEmpty()) {
            return response()->json([
                'status'  => false,
                'message' => 'Belum ada rating.',
                'average' => 0
            ], 200);
        }

        $totalNilai = 0;
        $totalVote  = 0;

        foreach ($ratings as $r) {
            $totalNilai += $r->rating * $r->total;
            $totalVote  += $r->total;
        }

        $average = $totalNilai / $totalVote;

        return response()->json([
            'status'  => true,
            'message' => 'Rata-rata rating website.',
            'average' => round($average, 2)
        ], 200);
    }

        return response()->json([
            'status' => true,
            'message' => 'Rata-rata rating website.',
            'average' => round($average, 2)
        ], 200);
    }

    public function destroy($id)
    {
        $rating = RatingWebsite::find($id);

        if (!$rating) {
            return response()->json([
                'status' => false,
                'message' => 'Rating tidak ditemukan.',
                'data' => null
            ], 404);
        }

        if ($rating->photo_profil && Storage::disk('public')->exists($rating->photo_profil)) {
            Storage::disk('public')->delete($rating->photo_profil);
        }

        $rating->delete();

        // 🔥 LOG AKTIVITAS DELETE
        logActivity(
            'admin',
            'Admin menghapus rating ID ' . $id,
            'delete',
            $id,
            'rating_websites'
        );

        return response()->json([
            'status' => true,
            'message' => 'Rating berhasil dihapus.',
            'data' => null
        ], 200);
    }
}
