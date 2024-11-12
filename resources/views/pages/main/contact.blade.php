@extends('layouts.layoutpages')

@section('title', 'Contact || Botanica')

@section('content')
<div class="page-wrapper">
    <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div>
    </div>
    <!-- /.stricky-header -->

    <!-- Page Header Start -->
    <section class="page-header">
      <div
        class="page-header__bg"
        style="
          background-image: url('{{ asset('images/backgrounds/page-header-bg-5.jpg') }}');
        "></div>
      <div class="container">
        <div class="page-header__inner">
          <ul class="thm-breadcrumb list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li><span>/</span></li>
            <li>Contact</li>
          </ul>
          <h2>Contact</h2>
        </div>
      </div>
    </section>
    <!-- Page Header End -->

    <!-- Spa Center Three Start -->
    <section class="spa-center-three">
      <div class="container">
        <div class="section-title text-center">
          <span class="section-title__tagline">Locations</span>
          <h2 class="section-title__title">Our Spa Centers</h2>
        </div>
      </div>
    </section>
    <!-- Spa Center Three End -->

    <!-- Google Map Start -->
    <section class="contact-page__google-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4514278496486!2d106.80341777441511!3d-6.590676664425747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f4e26d8ebd%3A0x3b546f20e25e5a00!2sBotanica%20Beauty%20Salon!5e0!3m2!1sen!2sid!4v1728962994854!5m2!1sen!2sid"
        width="600"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="contact-page__google-map-one"
        allowfullscreen></iframe>
    </section>
    <!-- Google Map End -->

    <!-- Contact Page Start -->
    <section class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5">
            <div class="contact-page__left">
              <div class="section-title text-left">
                <span class="section-title__tagline">Contact us</span>
                <h2 class="section-title__title">Send a Message</h2>
              </div>
              <p class="contact-page__text">
                Tertarik menggunakan layanan kami? Ingin tahu <br />
                lebih lanjut? Tanyakan pada kami sekarang!
              </p>
              <div class="contact-page__social">
                <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/botanicabeautysalon/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://s.shopee.co.id/7Uy55fD1cE" target="_blank"><i class="fas fa-shopping-bag"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7">
            <div class="contact-page__right">
              <div class="contact-page__content">
                <form id="contactForm" class="contact-page__form" onsubmit="sendMessageToWhatsApp(event)">
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="contact-page__form-input-box">
                        <input type="text" placeholder="Full Name" id="name" required />
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="contact-page__form-input-box">
                        <input type="email" placeholder="Email Address" id="email" required />
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="contact-page__form-input-box">
                        <input type="text" placeholder="Phone" id="phone" required />
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="contact-page__form-input-box">
                        <input type="text" placeholder="Subject" id="subject" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="contact-page__form-input-box text-message-box">
                      <textarea id="message" placeholder="Write a Message" required></textarea>
                    </div>
                    <div class="contact-page__btn-box">
                      <button type="submit" class="thm-btn contact-page__btn">
                        Send a message
                      </button>
                    </div>
                  </div>
                </form>
                <div class="result"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Page End -->
  </div>

  <!-- JavaScript untuk Membuat URL WhatsApp -->
  <script>
    function sendMessageToWhatsApp(event) {
      event.preventDefault(); // Mencegah form submit secara default

      // Ambil data dari input
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;

      // Format nomor tujuan dalam format internasional (contoh: +6281234567890)
      const whatsappNumber = '6288975365090';


      // Format pesan
      const whatsappMessage = `Nama: ${name}\nEmail: ${email}\nPhone: ${phone}\nSubject: ${subject}\nMessage: ${message}`;

      // Encode pesan untuk URL
      const encodedMessage = encodeURIComponent(whatsappMessage);

      // Buat URL WhatsApp
      const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

      // Buka URL di tab baru
      window.open(whatsappURL, '_blank');
    }
  </script>
@endsection
