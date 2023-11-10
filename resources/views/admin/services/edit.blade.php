@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
<h1>Edit Service</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Service</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Service:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $service->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" id="description" rows="4"
                    required>{{ $service->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" name="price" class="form-control" id="price"
                        value="{{ number_format($service->price, 0, ',', '.') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="duration">Durasi (dalam menit):</label>
                <input type="number" name="duration" class="form-control" id="duration" value="{{ $service->duration }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@stop