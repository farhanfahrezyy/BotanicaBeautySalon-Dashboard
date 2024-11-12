<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where(function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%')
                        ->orWhere('email', 'like', '%' . $name . '%')
                        ->orWhere('role', 'like', '%' . $name . '%');
                });
            })
            ->when($request->input('role'), function ($query, $role) {
                return $query->where('role', $role);
            })
            ->paginate($request->input('pagination', 10));

        $type_menu = 'admin';
        return view('pages.admin.user.index', compact('users', 'type_menu'));
    }


    public function create()
    {
        $type_menu = 'admin';
        return view('pages.admin.user.create', compact('type_menu')); // Tampilkan view form create admin
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        // Debug: Lihat semua data yang dikirim
        // dd($request->all());

        // Simpan data ke database
        User::create([
            'name' => $request->nama_lengkap, // Pastikan ini sesuai dengan nama kolom di database
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Redirect kembali ke halaman daftar admin
        return redirect()->route('admin.user.index')->with('success', 'Admin berhasil ditambahkan.');
    }


    public function edit($id)
    {
        // Ambil data user berdasarkan ID untuk diedit
        $type_menu = 'admin';
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user', 'type_menu'));
    }

    public function update(Request $request, $id)
    {
        // Find the user or fail if not found
        $user = User::findOrFail($id);

        // Validate input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        // Update user details
        $user->name = $request->input('nama_lengkap');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Only update the password if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save the user model
        $user->save();

        // Redirect with success message
        return redirect()->route('admin.user.index')->with('success', 'Data admin berhasil diperbarui.');
    }






    public function destroy($id)
    {
        // Hapus user berdasarkan ID
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Admin berhasil dihapus.');
    }
}
