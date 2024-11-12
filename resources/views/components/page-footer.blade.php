<footer class="site-footer">
    <div class="site-footer__shape-1 float-bob-x">
      <img src="{{ asset('images/shapes/site-footer-shape-1.png') }}" alt="" />
    </div>
    <div class="site-footer__shape-2 float-bob-y">
      <img src="{{ asset('images/shapes/site-footer-shape-2.png') }}" alt="" />
    </div>
    <div class="container">
      <div class="site-footer__top">
        <div class="row">
          <div
            class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
            data-wow-delay="100ms">
            <div class="footer-widget__column footer-widget__contact-box">
              <div class="footer-widget__contact">
                <a href="mailto:salonbotanicabeauty@gmail.com"
                  >salonbotanicabeauty@gmail.com
                
                <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0" target="_blank">+62 889-7536-5090</a>
              </div>
              <div class="footer-widget__contact-form-box">
                {{-- <form
                  class="footer-widget__contact-form mc-form"
                  data-url="MC_FORM_URL"
                  novalidate="novalidate">
                  <div class="footer-widget__contact-form-input-box">
                    <input
                      type="email"
                      placeholder="Email address"
                      name="EMAIL" />
                    <button
                      type="submit"
                      class="footer-widget__newsletter-btn">
                      <img
                        src="{{ asset('images/icon/paper-plan-icon.png') }}"
                        alt="" />
                    </button>
                  </div>
                </form> --}}
                <div class="mc-form__response"></div>
              </div>
            </div>
          </div>
          <div
            class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp"
            data-wow-delay="200ms">
            <div class="footer-widget__column footer-widget__links">
              <div class="footer-widget__title-box">
                <h4 class="footer-widget__title">Links</h4>
              </div>
              <ul class="footer-widget__links-list list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('service') }}">Our Services</a></li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('product.catalog') }}">Shop</a></li>
                <li><a href="{{ route('blog.show') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
            </div>
          </div>
              <div
            class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
            data-wow-delay="300ms">
            <div class="footer-widget__column footer-widget__timing">
              <div class="footer-widget__title-box">
                <h4 class="footer-widget__title">Timing</h4>
              </div>
              <ul class="footer-widget__timing-list list-unstyled">
                <li>Tuesday to Sunday:<br> 11:00 to 20:00</li>
              </ul>
            </div>
          </div>
          <div
            class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
            data-wow-delay="400ms">
            <div class="footer-widget__column footer-widget__social-box">
              <div class="site-footer__social">
                <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/botanicabeautysalon/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://s.shopee.co.id/7Uy55fD1cE" target="_blank"><i class="fas fa-shopping-bag"></i></a>
              </div>
              <p>
                Jl. Kumbang No.12, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="site-footer__bottom">
        <div class="row">
          <div class="col-xl-12">
            <div class="site-footer__bottom-inner">
              <p class="site-footer__bottom-text">
                © Copyright 2024 by <a href="#">salonbotanicabeauty.com</a>
              </p>
              <ul class="list-unstyled site-footer__bottom-menu">
                {{-- <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li> --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
