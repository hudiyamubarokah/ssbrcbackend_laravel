<?php

namespace App\Http\Controllers;
use App\Models\berita;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $beritas = Berita::all();
        return response()->json($beritas, 200);
    }

    // Mendapatkan satu data berita berdasarkan ID
    public function show($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['error' => 'Data berita tidak ditemukan'], 404);
        }

        return response()->json($berita, 200);
    }

    // Menyimpan data berita baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'link_br' => 'required',
            'photo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 422);
        }

        $berita = Berita::create($request->all());

        return response()->json($berita, 201);
    }

    // Mengupdate data berita berdasarkan ID
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['error' => 'Data berita tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'link_br' => 'required',
            'photo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 422);
        }

        $berita->update($request->all());

        return response()->json($berita, 200);
    }

    // Menghapus data berita berdasarkan ID
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['error' => 'Data berita tidak ditemukan'], 404);
        }

        $berita->delete();

        return response()->json(['message' => 'Data berita berhasil dihapus'], 200);
    }
}
