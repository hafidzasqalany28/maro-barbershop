@extends('adminlte::page')

@section('title', 'Daftar Kapster')

@section('content_header')
<h1>Daftar Kapster</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Kapster</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('kapsters.create') }}" class="btn btn-primary">Tambah Kapster Baru</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kapster</th>
                            <th>Jadwal Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kapsters as $kapster)
                        <tr>
                            <td>{{ $kapster->id }}</td>
                            <td>{{ $kapster->name }}</td>
                            <td>
                                @foreach($kapster->work_schedule as $day => $schedule)
                                <strong>{{ $day }}:</strong> {{ implode(', ', $schedule) }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('kapsters.edit', $kapster->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('kapsters.destroy', $kapster->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus Kapster ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop