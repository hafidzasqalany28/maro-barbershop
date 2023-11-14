@extends('adminlte::page')

@section('title', 'Daftar Services')

@section('content_header')
<h1>Daftar Services</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Services</h3>
    </div>
    <div class="card-body table-responsive">
        <a href="{{ route('services.create') }}" class="btn btn-primary">Tambah Service Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                    <td>{{ $service->duration }} menit</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus Service ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop