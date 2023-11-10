<!-- resources/views/admin/kapsters/create.blade.php -->

@extends('adminlte::page')

@section('title', 'Tambah Kapster Baru')

@section('content_header')
<h1>Tambah Kapster Baru</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Kapster Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('kapsters.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Kapster:</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="work_schedule">Jadwal Kerja:</label>
                        <textarea name="work_schedule" class="form-control" id="work_schedule" rows="4"
                            required></textarea>
                        <small>Format jadwal: {"Monday":["10:00-22:00"],"Tuesday":["10:00-22:00"]}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
</style>
@stop