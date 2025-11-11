<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\UmkmContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UmkmContactController extends Controller
{
    public function index()
    {
        $contacts = UmkmContact::where('status', 'active')->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar kontak berhasil diambil',
            'data' => $contacts
        ], 200);
    }

    public function show(Umkm $umkm)
    {
        $contact = UmkmContact::where('umkm_id', $umkm->id)
            ->where('status', 'active')
            ->first();

        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Kontak tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail kontak berhasil diambil',
            'data' => $contact
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'whatsapp' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9]+$/', // ✅ hanya angka dan boleh ada tanda +
            ],
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
        ], [
            'whatsapp.regex' => 'Nomor WhatsApp hanya boleh berisi angka dan tanda + di awal.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        // 🔒 Cegah duplikasi kontak untuk satu UMKM
        $existingContact = UmkmContact::where('umkm_id', $data['umkm_id'])->first();
        if ($existingContact) {
            return response()->json([
                'status' => false,
                'message' => 'Setiap UMKM hanya boleh memiliki satu data kontak',
                'data' => $existingContact
            ], 409);
        }

        $data['status'] = 'active';
        $contact = UmkmContact::create($data);
        $contact->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Kontak berhasil ditambahkan',
            'data' => [
                'id' => $contact->id,
                'umkm_id' => $contact->umkm_id,
                'whatsapp' => $contact->whatsapp,
                'email' => $contact->email,
                'instagram' => $contact->instagram,
                'status' => $contact->status,
                'created_at' => $contact->created_at,
                'updated_at' => $contact->updated_at,
            ]
        ], 201);
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validator = Validator::make($request->all(), [
            'whatsapp' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9]+$/', // ✅ validasi nomor + angka
            ],
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
        ], [
            'whatsapp.regex' => 'Nomor WhatsApp hanya boleh berisi angka dan tanda + di awal.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'data' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();
        $data['status'] = 'active';

        $contact = UmkmContact::updateOrCreate(
            ['umkm_id' => $umkm->id],
            $data
        );

        return response()->json([
            'status' => true,
            'message' => 'Kontak berhasil disimpan',
            'data' => $contact
        ], 200);
    }

    public function destroy($id)
    {
        $contact = UmkmContact::find($id);

        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Kontak tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($contact->status === 'inactive') {
            return response()->json([
                'status' => false,
                'message' => 'Kontak sudah tidak aktif',
                'data' => $contact
            ], 400);
        }

        $contact->status = 'inactive';
        $contact->save();
        $contact->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Kontak berhasil dinonaktifkan',
            'data' => $contact
        ], 200);
    }

    public function activate($id)
    {
        $contact = UmkmContact::find($id);

        if (!$contact) {
            return response()->json([
                'status' => false,
                'message' => 'Kontak tidak ditemukan',
                'data' => null
            ], 404);
        }

        if ($contact->status === 'active') {
            return response()->json([
                'status' => false,
                'message' => 'Kontak sudah aktif',
                'data' => $contact
            ], 400);
        }

        $contact->status = 'active';
        $contact->save();
        $contact->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Kontak berhasil diaktifkan kembali',
            'data' => $contact
        ], 200);
    }
}
