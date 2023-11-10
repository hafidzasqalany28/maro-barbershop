@extends('adminlte::page')

@section('title', 'Edit Pelanggan')

@section('content_header')
<h1>Edit Pelanggan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pelanggan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Pelanggan:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $customer->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $customer->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Password Baru:</label>
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Kosongkan jika tidak ingin mengubah kata sandi">
            </div>
            <!-- Tambahkan field lain sesuai kebutuhan Anda -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@stop