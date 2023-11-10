@extends('adminlte::page')

@section('title', 'Tambah Pelanggan Baru')

@section('content_header')
<h1>Tambah Pelanggan Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Pelanggan Baru</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Pelanggan:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
            </div>
            <!-- Tambahkan field lain sesuai kebutuhan Anda -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop