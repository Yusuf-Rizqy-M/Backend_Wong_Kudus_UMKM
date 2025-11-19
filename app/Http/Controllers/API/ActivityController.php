<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $data = Activity::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar aktivitas terbaru',
            'data' => $data
        ]);
    }
}
