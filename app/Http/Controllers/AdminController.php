<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.index')->with('users', $users);
    }

    public function assignRole(Request $request, User $user)
{
    $validatedData = $request->validate([
        'role' => 'required|in:mahasiswa,koordinator,dosenPenguji,dosenPembimbing,BAAK',
    ]);

    // Ambil peran (role) baru dari request
    $newRole = $validatedData['role'];

    // Dapatkan instance peran (role) baru dari database
    $role = Role::where('name', $newRole)->first();

    // Periksa apakah pengguna memiliki peran (role) sebelumnya
    if ($user->hasRole($newRole)) {
        // Jika pengguna sudah memiliki peran (role) yang sama, tidak perlu melakukan apa pun
        return Redirect::back()->with('info', 'User already has the selected role');
    }

    // Bersihkan peran (role) sebelumnya pengguna
    $user->roles()->detach();

    // Tambahkan peran (role) baru kepada pengguna
    $user->assignRole($role);

    return Redirect::back()->with('success', 'Role assigned successfully');
}

}

