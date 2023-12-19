<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Validator;

class KeuanganController extends Controller
{
    // Mendapatkan semua catatan keuangan
    // public function getKeuangan()
    // {
    //     $data = Keuangan::all();
        
    //     if ($data->count() > 0) {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Berhasil menampilkan data',
    //             'data' => $data
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'Data tidak tersedia'
    //     ]);
    // }

    // public function postKeuangan(Request $request)
    // {
    //     $request->validate([
    //         'description' => 'required|string',
    //         'saldo' => 'required|numeric',
    //         'type' => 'required|in:pemasukan,pengeluaran',
    //         'tgl_transaksi' => 'required|date',
    //     ]);

    //     $data = Keuangan::create([
    //         'description' => $request->description,
    //         'saldo' => $request->saldo,
    //         'type' => $request->type,
    //         'tgl_transaksi' => $request->tgl_transaksi,
    //     ]);

    //     if ($data) {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Berhasil Menambahkan Data',
    //             'data' => $data
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 404,
    //         'message' => 'Gagal Menambahkan Data'
    //     ]);
    // }

    public function index()
    {
        $keuangans = Keuangan::all();
        return response()->json($keuangans, 200);
    }

    // Mendapatkan satu catatan keuangan berdasarkan ID
    public function show($id)
    {
        $keuangan = Keuangan::find($id);

        if (!$keuangan) {
            return response()->json(['error' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        return response()->json($keuangan, 200);
    }

    // Menyimpan catatan keuangan baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'saldo' => 'required|numeric',
            'type' => 'required|in:pemasukan,pengeluaran',
            'tgl_transaksi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 422);
        }

        $keuangan = Keuangan::create($request->all());

        return response()->json($keuangan, 201);
    }

    // Mengupdate catatan keuangan berdasarkan ID
    public function update(Request $request, $id)
    {
        $keuangan = Keuangan::find($id);

        if (!$keuangan) {
            return response()->json(['error' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'saldo' => 'required|numeric',
            'type' => 'required|in:pemasukan,pengeluaran',
            'tgl_transaksi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 422);
        }

        $keuangan->update($request->all());

        return response()->json($keuangan, 200);
    }

    // Menghapus catatan keuangan berdasarkan ID
    public function destroy($id)
    {
        $keuangan = Keuangan::find($id);

        if (!$keuangan) {
            return response()->json(['error' => 'Catatan keuangan tidak ditemukan'], 404);
        }

        $keuangan->delete();

        return response()->json(['message' => 'Catatan keuangan berhasil dihapus'], 200);
    }
}
