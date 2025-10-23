<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContactUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUmkmController extends Controller
{
    /**
     * Menampilkan semua pesan yang masuk
     */
    public function index()
    {
        $contacts = ContactUmkm::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menampilkan semua pesan.',
            'data' => $contacts
        ], 200);
    }

    /**
     * Mengirim pesan baru
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required|string|max:255',
            'sender_name_last' => 'nullable|string|max:255',
            'sender_email' => 'required|email|max:255',
            'no_telepon' => 'required|string|digits_between:10,14',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $contact = ContactUmkm::create([
            'sender_name' => $request->sender_name,
            'sender_name_last' => $request->sender_name_last,
            'sender_email' => $request->sender_email,
            'no_telepon' => $request->no_telepon,
            'message' => $request->message,
            'status' => 'active',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Pesan berhasil dikirim.',
            'data' => $contact
        ], 201);
    }

    /**
     * Menampilkan detail pesan berdasarkan ID
     */
    public function show($id)
    {
        $contact = ContactUmkm::find($id);

        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Pesan tidak ditemukan.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail pesan berhasil diambil.',
            'data' => $contact
        ], 200);
    }

    /**
     * Menonaktifkan pesan (soft delete manual)
     */
    public function destroy($id)
    {
        $contact = ContactUmkm::find($id);

        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Pesan tidak ditemukan.',
                'data' => null
            ], 404);
        }

        if ($contact->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Pesan sudah tidak aktif.',
                'data' => $contact
            ], 400);
        }

        $contact->update(['status' => 'inactive']);

        return response()->json([
            'status' => true,
            'message' => 'Pesan berhasil dinonaktifkan.',
            'data' => $contact
        ], 200);
    }
    public function markAsRead($id)
{
    $contact = ContactUmkm::find($id);

    if (!$contact) {
        return response()->json([
            'status' => false,
            'message' => 'Pesan tidak ditemukan',
            'data' => null
        ], 404);
    }

    if ($contact->status === 'read') {
        return response()->json([
            'status' => false,
            'message' => 'Pesan sudah dibaca',
            'data' => $contact
        ], 400);
    }

    $contact->update(['status' => 'read']);

    return response()->json([
        'status' => true,
        'message' => 'Pesan berhasil ditandai sebagai dibaca',
        'data' => $contact
    ], 200);
}

}
