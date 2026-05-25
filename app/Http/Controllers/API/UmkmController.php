<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UmkmController extends Controller
{
    protected function getActiveRelations()
    {
        return [
            'category',
            'gallery' => function ($query) {
                $query->where('status', 'active');
            },
            'openingHours' => function ($query) {
                $query->where('status', 'active');
            },
            'listing' => function ($query) {
                $query->where('status', 'active');
            },
            'location' => function ($query) {
                $query->where('status', 'active');
            },
            'contact' => function ($query) {
                $query->where('status', 'active');
            },
            'menus' => function ($query) {
                $query->where('status', 'active');
            }
        ];
    }

    public function totalUmkm()
    {
        $total = Umkm::where('status', 'active')->count();
        logActivity('admin', 'Admin mengambil total UMKM', 'read', null, 'umkms');
        return response()->json([
            'total_umkm' => $total,
            'message' => "$total UMKM aktif terdaftar di sistem."
        ]);
    }

    protected function transformUmkmUrls($umkm)
    {
        if (!$umkm) return null;

        if ($umkm->hero_image) {
            $umkm->hero_image = url(Storage::url($umkm->hero_image));
        }

        if ($umkm->relationLoaded('gallery')) {
            foreach ($umkm->gallery as $item) {
                if ($item->image) $item->image = url(Storage::url($item->image));
            }
        }

        if ($umkm->relationLoaded('menus')) {
            foreach ($umkm->menus as $menu) {
                if ($menu->image) $menu->image = url(Storage::url($menu->image));
            }
        }

        if ($umkm->relationLoaded('listing') && $umkm->listing && $umkm->listing->image) {
            $umkm->listing->image = url(Storage::url($umkm->listing->image));
        }

        if ($umkm->relationLoaded('category') && $umkm->category && $umkm->category->icon) {
            $umkm->category->icon = url(Storage::url($umkm->category->icon));
        }

        return $umkm;
    }

    public function index()
    {
        $umkms = Umkm::with($this->getActiveRelations())
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn($umkm) => $this->transformUmkmUrls($umkm));

        logActivity('admin', 'Admin mengambil semua daftar UMKM', 'read', null, 'umkms');

        return response()->json([
            'status' => true,
            'message' => 'Daftar UMKM berhasil diambil',
            'data' => $umkms
        ], 200);
    }

    public function show($id)
    {
        $umkm = Umkm::with($this->getActiveRelations())->find($id);

        if (!$umkm || $umkm->status !== 'active') {
            return response()->json([
                'status' => false,
                'message' => 'UMKM tidak ditemukan atau tidak aktif',
                'data' => null
            ], 404);
        }

        $this->transformUmkmUrls($umkm);
        logActivity('admin', 'Admin melihat detail UMKM ' . $umkm->name, 'read', $umkm->id, 'umkms');

        return response()->json([
            'status' => true,
            'message' => 'Detail UMKM berhasil diambil',
            'data' => $umkm
        ], 200);
    }

    public function store(Request $request)
    {
        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'kecamatan' => ['nullable', Rule::in($listKecamatan)],
            'name' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'about' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Umkm::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('uploads/umkm', 'public');
        }

        $data['status'] = 'active';
        $umkm = Umkm::create($data);
        $umkm->load($this->getActiveRelations());
        $this->transformUmkmUrls($umkm);

        logActivity('admin', 'Admin membuat UMKM ' . $umkm->name, 'create', $umkm->id, 'umkms');

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil dibuat',
            'data' => $umkm
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json(['status' => false, 'message' => 'UMKM tidak ditemukan'], 404);
        }

        $listKecamatan = ['Kudus Kota', 'Jati', 'Bae', 'Mejobo', 'Undaan', 'Gebog', 'Dawe'];

        $validator = Validator::make($request->all(), [
            'category_id' => 'sometimes|exists:categories,id',
            'kecamatan' => ['sometimes', 'nullable', Rule::in($listKecamatan)],
            'name' => 'sometimes|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'about' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validasi gagal', 'data' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        if ($request->has('name') && $request->name !== $umkm->name) {
            $slug = Str::slug($data['name']);
            $originalSlug = $slug;
            $count = 1;
            while (Umkm::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('hero_image')) {
            if ($umkm->hero_image && Storage::disk('public')->exists($umkm->hero_image)) {
                Storage::disk('public')->delete($umkm->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('uploads/umkm', 'public');
        }

        $umkm->update($data);
        $umkm->refresh();
        $umkm->load($this->getActiveRelations());
        $this->transformUmkmUrls($umkm);

        logActivity('admin', 'Admin memperbarui UMKM ' . $umkm->name, 'update', $umkm->id, 'umkms');

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil diperbarui',
            'data' => $umkm
        ], 200);
    }

    public function destroy($id)
    {
        $umkm = Umkm::find($id);

        if (!$umkm) {
            return response()->json(['status' => false, 'message' => 'UMKM tidak ditemukan'], 404);
        }

        if ($umkm->status === 'inactive') {
            return response()->json(['status' => false, 'message' => 'UMKM sudah tidak aktif'], 400);
        }

        $umkm->update(['status' => 'inactive']);

        $this->transformUmkmUrls($umkm);
        logActivity('admin', 'Admin menonaktifkan UMKM ' . $umkm->name, 'delete', $umkm->id, 'umkms');

        return response()->json([
            'status' => true,
            'message' => 'UMKM berhasil dinonaktifkan (Soft Delete)',
            'data' => $umkm
        ], 200);
    }
}
