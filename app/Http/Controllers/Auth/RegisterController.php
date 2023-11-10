<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Membuat pengguna baru
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Data pelanggan yang akan dimasukkan ke dalam tabel "customers"
        $customerData = [
            'name' => $data['name'],
            'phone' => '', // Tambahkan kolom nomor telepon jika diperlukan
            'email' => $data['email'],
            'user_id' => $user->id, // Setel 'user_id' dengan ID pengguna yang baru dibuat
        ];

        // Membuat pelanggan baru dengan data di atas
        Customer::create($customerData);

        // Mengatur role_id pengguna sesuai dengan peran pelanggan
        $user->update(['role_id' => 2]); // Ganti 2 dengan nilai role_id yang sesuai untuk pelanggan

        return $user;
    }
}
