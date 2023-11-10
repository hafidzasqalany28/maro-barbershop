@extends('adminlte::page')

@section('title', 'Edit Kapster')

@section('content_header')
<h1>Edit Kapster</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kapsters.update', $kapster->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama Kapster:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $kapster->name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="work_schedule">Jadwal Kerja:</label>
                        <input type="text" name="work_schedule" class="form-control" id="work_schedule"
                            value="{{ $kapster->getFormattedWorkSchedule() }}" required>
                        <small>Format jadwal: {"Monday":["10:00-22:00"],"Tuesday":["10:00-22:00"]}</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

@section('js')
<script>
    // Mendeteksi perubahan pada input jadwal kerja
    document.getElementById('work_schedule').addEventListener('change', function () {
        var newSchedule = this.value;
        // Validasi dan menyimpan perubahan ke database
        // Anda perlu mengurai dan memproses input jadwal baru
        // serta menyimpannya ke database
    });
</script>
@stop