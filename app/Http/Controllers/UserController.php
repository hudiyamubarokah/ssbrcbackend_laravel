<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'photo' => 'nullable|string',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'nohp' => 'required|string',
            'token' => 'required|string',
        ]);

        $user = User::create($data);

        return response()->json(['user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'string',
            'photo' => 'nullable|string',
            'alamat' => 'string',
            'jabatan' => 'string',
            'nohp' => 'string',
            'token' => 'string',
        ]);

        $user->update($data);

        return response()->json(['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
