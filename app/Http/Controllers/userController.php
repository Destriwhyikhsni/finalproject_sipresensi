<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $users = User::with('pegawai')->get();
        return view('user', compact('users'));
    }

    public function create()
    {
        $pegawai = Pegawai::doesntHave('user')->get(); // Pegawai tanpa akun
        return view('user.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',  // Validasi id_pegawai yang ada di tabel pegawai
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required|in:0,1',
        ]);
    
        $user = new User();
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pegawai_id = $request->id_pegawai;  // Menyimpan id_pegawai ke dalam tabel users
        $user->role = $request->role;
        $user->status = 1; //aktif
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $pegawai = Pegawai::doesntHave('user')->orWhere('id_pegawai', $user->pegawai_id)->get();
        return view('user.edit', compact('user', 'pegawai'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'pegawai_id' => 'required|exists:pegawai,id_pegawai',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'pegawai_id' => $request->pegawai_id,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function getPegawai($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
    
        if ($pegawai) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'name' => $pegawai->nama_pegawai,
                    'email' => $pegawai->email,
                ]
            ]);
        }
    
        return response()->json([
            'status' => 'error',
            'message' => 'Pegawai tidak ditemukan.'
        ]);
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

