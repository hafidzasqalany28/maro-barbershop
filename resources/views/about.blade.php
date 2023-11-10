@extends('layouts.app')

@section('content')
<!-- Hero Start -->
<div class="slider-area2" style="height: 150px;"></div>
<!-- Hero End -->

<!-- About Area Start -->
<section class="about-area section position-relative">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-50 mt-30">
                    <h2>Tentang Kami</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-11">
                <!-- About Image -->
                <div class="about-img">
                    <img src="{{ asset('assets/img/gallery/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-caption">
                    <!-- Section Title -->
                    <div class="section-tittle section-tittle3 mb-35">
                        <span>Deskripsi Singkat</span>
                        <h2>52 Tahun Pengalaman dalam Potongan Rambut!</h2>
                    </div>
                    <p class="mb-30 pera-bottom">Maro Barbershop menyajikan layanan potongan rambut dengan pendekatan
                        yang fleksibel, nyaman, dan modern. Kami memahami bahwa setiap individu memiliki preferensi dan
                        kebutuhan yang unik. Itulah mengapa kami memberikan Anda kebebasan untuk memilih tata letak dan
                        elemen yang sesuai dengan selera Anda, dengan kemungkinan kustomisasi tanpa batas. Kami dengan
                        teliti mereplikasi visi perancang untuk memberikan hasil yang sesuai dengan ekspektasi Anda.
                        Selami pengalaman unik potongan rambut Anda di Maro Barbershop!</p>
                    <p class="mb-30 pera-bottom">Kami berkomitmen untuk memberikan layanan yang fleksibel dan beragam
                        agar
                        Anda merasa nyaman dan puas. Di Maro Barbershop, Anda memiliki kebebasan untuk memilih layanan
                        yang sesuai dengan preferensi Anda. Kami mengundang Anda untuk mengunjungi Maro Barbershop dan
                        merasakan pengalaman potongan rambut terbaik yang kami tawarkan. Dapatkan penampilan terbaik
                        Anda dengan layanan kami!</p>
                    <img src="{{ asset('assets/img/gallery/signature.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About Shape -->
    <div class="about-shape">
        <img src="{{ asset('assets/img/gallery/about-shape.png') }}" alt="">
    </div>
</section>
<!-- About Area End -->

<!-- Team Start -->
<div class="team-area pt-50 ">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-100">
                    <span>Kapster Kami</span>
                    <h2>Foto-foto dari Barbershop Kami</h2>
                </div>
            </div>
        </div>
        <div class="row team-active dot-style">
            <!-- Loop untuk menampilkan daftar kapster -->
            @foreach($kapsters as $kapster)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-80 text-center">
                    <div class="team-img">
                        <!-- Ganti src gambar sesuai dengan atribut gambar pada model barber -->
                        <img src="{{ asset('assets/img/gallery/' . str_replace(' ', '', $kapster->name) . '.png') }}"
                            alt="{{ $kapster->name }}">

                    </div>
                    <div class="team-caption">
                        <!-- Tampilkan atribut-atribut kapster -->
                        <span>{{ $kapster->specialization }}</span>
                        <form method="POST" action="{{ route('select-kapster') }}">
                            @csrf
                            <input type="hidden" name="kapster_id" value="{{ $kapster->id }}">
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
<!-- Team End -->

<!--? Gallery Area Start -->
<div class="gallery-area pt-50">
    <div class "container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9 col-sm-10">
                <div class="section-tittle text-center mb-100">
                    <span>Galeri Foto Kami</span>
                    <h2>Beberapa Gambar dari Barbershop Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box snake mb-30">
                    <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="box snake mb-30">
                    <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="box snake mb-30">
                    <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box snake mb-30">
                    <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Area End -->
@endsection