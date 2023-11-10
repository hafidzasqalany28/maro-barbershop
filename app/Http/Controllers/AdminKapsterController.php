<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kapster;
use Illuminate\Http\Request;

class AdminKapsterController extends Controller
{
    public function index()
    {
        $kapsters = Kapster::all();
        return view('admin.kapsters.index', compact('kapsters'));
    }

    public function create()
    {
        return view('admin.kapsters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'work_schedule' => 'required|json',
        ]);

        // Buat Kapster baru
        $kapster = new Kapster;
        $kapster->name = $request->input('name');
        $kapster->work_schedule = json_decode($request->input('work_schedule'), true);
        $kapster->user_id = 1;
        $kapster->save();


        // Buat pengguna baru dan hubungkan dengan Kapster
        $user = new User;
        $user->name = $kapster->name; // Gunakan nama Kapster sebagai nama pengguna
        $user->email = strtolower(str_replace(' ', '', $user->name)) . '@gmail.com'; // Buat email dengan nama Kapster
        $user->password = bcrypt('12345678'); // Atur kata sandi default (Anda dapat mengubahnya sesuai kebutuhan)
        $user->role_id = 3; // Set role_id sesuai dengan Kapster
        $user->save();

        // Hubungkan Kapster dengan pengguna
        $kapster->user_id = $user->id;
        $kapster->save();

        return redirect()->route('kapsters.index')->with('success', 'Kapster dan pengguna baru telah ditambahkan.');
    }



    public function show($id)
    {
        $kapster = Kapster::find($id);
        return view('admin.kapsters.show', compact('kapster'));
    }


    public function edit($id)
    {
        $kapster = Kapster::find($id);
        return view('admin.kapsters.edit', compact('kapster'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'work_schedule' => 'required|json',
        ]);

        $kapster = Kapster::find($id);

        if (!$kapster) {
            return redirect()->route('kapsters.index')->with('error', 'Kapster tidak ditemukan.');
        }

        // Perbarui data Kapster
        $kapster->name = $request->input('name');
        $kapster->work_schedule = json_decode($request->input('work_schedule'), true);
        $kapster->save();

        // Perbarui data pengguna terkait
        $user = $kapster->user;

        if ($user) {
            $user->name = $kapster->name;

            // Update email sesuai dengan nama Kapster
            $user->email = strtolower(str_replace(' ', '', $kapster->name)) . '@gmail.com';

            $user->save();
        }

        return redirect()->route('kapsters.index')->with('success', 'Kapster dan pengguna terkait telah diperbarui.');
    }



    public function destroy($id)
    {
        $kapster = Kapster::find($id);

        if (!$kapster) {
            return redirect()->route('kapsters.index')->with('error', 'Kapster tidak ditemukan.');
        }

        $user = $kapster->user;

        if (!$user) {
            return redirect()->route('kapsters.index')->with('error', 'Pengguna Kapster tidak ditemukan.');
        }

        try {
            // Hapus Kapster dan entitas User yang terkait
            $kapster->delete();
            $user->delete();
        } catch (\Exception $e) {
            return redirect()->route('kapsters.index')->with('error', 'Gagal menghapus Kapster dan pengguna.');
        }

        return redirect()->route('kapsters.index')->with('success', 'Kapster dan pengguna telah dihapus.');
    }
}
