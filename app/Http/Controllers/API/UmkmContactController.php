<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\UmkmContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\logActivity;

class UmkmContactController extends Controller
{
    private function prepareData(Request $request)
    {
        $fields = ['email', 'whatsapp', 'instagram'];
        foreach ($fields as $field) {
            $val = $request->input($field);
            if (!$val || trim($val) === '' || $val === 'null' || trim($val) === '-' || ($field === 'whatsapp' && $val === '62')) {
                $request->merge([$field => null]);
            }
        }
    }

    public function index()
    {
        $contacts = UmkmContact::where('status', 'active')->get();
        return response()->json(['status' => true, 'data' => $contacts], 200);
    }

    public function show($umkmId)
    {
        $contact = UmkmContact::where('umkm_id', $umkmId)
            ->where('status', 'active')
            ->first();

        if (!$contact) {
            return response()->json(['status' => true, 'data' => null], 200);
        }
        return response()->json(['status' => true, 'data' => $contact], 200);
    }

    public function store(Request $request)
    {
        $this->prepareData($request);

        $validator = Validator::make($request->all(), [
            'umkm_id' => 'required|exists:umkms,id',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $umkmCheck = Umkm::find($request->umkm_id);
        if (!$umkmCheck || $umkmCheck->status !== 'active') {
            return response()->json(['status' => false, 'message' => 'UMKM tidak aktif'], 404);
        }

        $data = $validator->validated();
        $data['status'] = 'active';

        $contact = UmkmContact::updateOrCreate(
            ['umkm_id' => $request->umkm_id],
            $data
        );

        logActivity('admin', 'Upsert kontak UMKM ID ' . $contact->umkm_id, 'create', $contact->id, 'umkm_contacts');

        return response()->json(['status' => true, 'message' => 'Berhasil disimpan', 'data' => $contact], 201);
    }

    public function update(Request $request, $umkmId)
    {
        $this->prepareData($request);

        $validator = Validator::make($request->all(), [
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $data['status'] = 'active';

        $contact = UmkmContact::updateOrCreate(
            ['umkm_id' => $umkmId],
            $data
        );

        logActivity('admin', 'Update kontak UMKM ID ' . $umkmId, 'update', $contact->id, 'umkm_contacts');

        return response()->json(['status' => true, 'message' => 'Berhasil disimpan', 'data' => $contact], 200);
    }

    public function destroy($id)
    {
        $contact = UmkmContact::find($id);

        if (!$contact) {
            return response()->json(['status' => false, 'message' => 'Tidak ditemukan'], 404);
        }

        $contact->update(['status' => 'inactive']);

        return response()->json(['status' => true, 'message' => 'Dinonaktifkan'], 200);
    }

    public function activate($id)
    {
        $contact = UmkmContact::find($id);

        if (!$contact) {
            return response()->json(['status' => false, 'message' => 'Tidak ditemukan'], 404);
        }

        $contact->update(['status' => 'active']);

        return response()->json(['status' => true, 'message' => 'Diaktifkan'], 200);
    }
}
