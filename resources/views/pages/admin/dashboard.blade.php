@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Botanica Beuty Salon</h2>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ asset('img/bbs/bbs_logo.png') }}"
                                    class="rounded-circle profile-widget-picture">
                                {{-- <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">823</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Followers</div>
                                        <div class="profile-widget-item-value">1.417</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Following</div>
                                        <div class="profile-widget-item-value">285</div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> Pemilik
                                    </div>
                                </div>
                                <p class="text-justify">Disirikan oleh <b>Debbie Luciani Prastiwi</b>, Botanica Beauty Salon
                                    hadir sebagai oase kecantikan bagi perempuan di Bogor, khususnya bagi para mahasiswi.
                                    Berlokasi di lingkungan Sekolah Vokasi IPB, Botanica Beauty Salon menjadi Salon
                                    Mahasiswa Pertama di Bogor, menawarkan akses mudah bagi para mahasiswi untuk memanjakan
                                    diri. Tak hanya mahasiswa, seluruh perempuan di Bogor dapat menikmati berbagai treatment
                                    istimewa di salon ini. Dengan tagline "Salon Khusus Wanita, Harga Ramah Kantong
                                    Mahasiswa, Treatment Istimewa!", Botanica Beauty Salon menawarkan kesempatan bagi setiap
                                    perempuan untuk mendapatkan pengalaman salon yang menyenangkan dengan harga terjangkau.
                                    Debbie Luciani Prastiwi, pemilik Botanica Beauty Salon, bertekad untuk menjadikan salon
                                    ini sebagai tempat bagi perempuan untuk merasa percaya diri dan memanjakan diri sebagai
                                    bentuk penghargaan atas perjuangan mereka dalam menjalani peran masing-masing. </p>
                            </div>

                        </div>
                    </div>
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1205094134093!2d106.82869237499396!3d-6.631951893362451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c99bea87cbfb%3A0xfb400081f1eea5ee!2sOne%20Home%20Farm%20Indonesia!5e0!3m2!1sid!2sid!4v1714887812132!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card p-3 mx-auto">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.90828428378!2d106.80341777277272!3d-6.590681993402993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f4e26d8ebd%3A0x3b546f20e25e5a00!2sBotanica%20Beauty%20Salon!5e1!3m2!1sid!2sid!4v1729011922025!5m2!1sid!2sid"
                                height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>

                </div>
            </div>



        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
