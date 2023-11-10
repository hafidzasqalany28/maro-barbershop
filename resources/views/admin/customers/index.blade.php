@extends('adminlte::page')

@section('title', 'Daftar Pelanggan')

@section('content_header')
<h1>Daftar Pelanggan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pelanggan</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pelanggan Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus Pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop