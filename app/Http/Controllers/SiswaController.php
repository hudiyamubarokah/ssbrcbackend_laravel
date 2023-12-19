<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas = Siswa::all();
        return response()->json($siswas, 200);
    }

    // Mendapatkan satu data siswa berdasarkan ID
    public function show($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
        }

        return response()->json($siswa, 200);
    }

    // Menyimpan data siswa baru
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:siswa,email',
    //         'password' => 'required',
    //         'alamat' => 'required',
    //         'jabatan' => 'required',
    //         'nohp' => 'required',
    //         'token' => 'required',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => 'Invalid input'], 422);
    //     }

    //     $siswa = Siswa::create($request->all());

    //     return response()->json($siswa, 201);
    // }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:siswa,email',
        'password' => 'required',
        'alamat' => 'required',
        'jabatan' => 'required',
        'nohp' => 'required',
        'token' => 'required',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Invalid input', 'errors' => $validator->errors()], 422);
    }

    $photo = $request->file('photo');
    $photoPath = $photo->storeAs('photos', 'siswa_'.$request->input('email').'.'.$photo->getClientOriginalExtension(), 'public');

    $siswa = Siswa::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'alamat' => $request->input('alamat'),
        'jabatan' => $request->input('jabatan'),
        'nohp' => $request->input('nohp'),
        'token' => $request->input('token'),
        'photo' => $photoPath,
    ]);

    return response()->json($siswa, 201);
}

    // Mengupdate data siswa berdasarkan ID
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:siswa,email,'.$siswa->id,
            'password' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'nohp' => 'required',
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 422);
        }

        $siswa->update($request->all());

        return response()->json($siswa, 200);
    }

    // Menghapus data siswa berdasarkan ID
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
        }

        $siswa->delete();

        return response()->json(['message' => 'Data siswa berhasil dihapus'], 200);
    }
}
