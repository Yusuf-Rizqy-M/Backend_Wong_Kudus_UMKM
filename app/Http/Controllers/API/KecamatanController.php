<?php

namespace App\Http\Controllers\API;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    public function index()
    {
        return response()->json(Kecamatan::all());
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);
        if (!$kecamatan) {
            return response()->json(['message' => 'Kecamatan not found'], 404);
        }
        return response()->json($kecamatan);
    }
}
