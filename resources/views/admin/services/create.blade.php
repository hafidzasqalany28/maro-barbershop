@extends('adminlte::page')

@section('title', 'Tambah Service Baru')

@section('content_header')
<h1>Tambah Service Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Service Baru</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Service:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga (dalam Rupiah):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" name="price" class="form-control" id="price"
                        value="{{ number_format(0, 0, ',', '.') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Durasi (dalam menit):</label>
                <input type="number" name="duration" class "form-control" id="duration" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop