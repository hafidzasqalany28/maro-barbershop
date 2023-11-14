@extends('layouts.app')

@section('content')
<div class="slider-area2" style="height: 150px;"></div>
<div class="team-area pb-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-50 mt-30">
                    <h2>Pilih Kapster</h2>
                </div>
            </div>
        </div>
        <div class="row team-active dot-style">
            @foreach($kapsters as $kapster)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-80 text-center">
                    <div class="team-img">
                        <img src="{{ asset('assets/img/gallery/' . str_replace(' ', '', $kapster->name) . '.png') }}"
                            alt="{{ $kapster->name }}">
                    </div>
                    <div class="team-caption">
                        <span>{{ $kapster->specialization }}</span>
                        <form method="POST" action="{{ route('select-kapster', ['kapster_id' => $kapster->id]) }}">
                            @csrf
                            <button type="submit" class="genric-btn custom-link"
                                style="background-color: transparent; border: none; color: #fff;">
                                {{ $kapster->name }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection