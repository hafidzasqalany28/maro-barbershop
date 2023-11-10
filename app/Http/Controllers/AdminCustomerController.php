<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required', // Tambahkan validasi password
            'phone' => 'required',
        ]);

        // Buat pengguna terlebih dahulu
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        $user->save();

        // Buat pelanggan terkait
        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->user_id = $user->id;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Pelanggan baru telah ditambahkan.');
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:customers,email,' . $id,
            // Tambahkan validasi dan field lain sesuai kebutuhan
        ]);

        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Pelanggan tidak ditemukan.');
        }

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        // Perbarui atribut lain sesuai kebutuhan

        $customer->save();

        // Perbarui juga data pengguna terkait
        $user = $customer->user;
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            // Perbarui atribut lain sesuai kebutuhan
            $user->save();
        }

        return redirect()->route('customers.index')->with('success', 'Pelanggan diperbarui.');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Pelanggan tidak ditemukan.');
        }

        // Hapus pelanggan
        $customer->delete();

        // Periksa apakah ada pengguna terkait
        $user = $customer->user;
        if ($user) {
            // Hapus pengguna jika ada
            $user->delete();
        }

        return redirect()->route('customers.index')->with('success', 'Pelanggan telah dihapus.');
    }
}
