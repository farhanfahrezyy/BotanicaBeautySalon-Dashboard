@push('style')
<style>
.main-menu__list .active a {
    color: #ff0000; /* Warna yang diinginkan */
    font-weight: bold;
}
</style>

@endpush


<header class="main-header">
    <div class="main-header__top">
        <div class="main-header__top-wrapper">
            <div class="main-header__top-inner">
                <div class="main-header__top-left">
                    <ul class="list-unstyled main-header__contact-list">
                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="text">
                                <p>
                                    <a href="salonbotanicabeauty@gmail.com">salonbotanicabeauty@gmail.com</a>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="text">
                                <p>
                                    <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0"
                                        target="_blank">+62 889-7536-5090</a>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="main-header__top-right">
                    <div class="main-header__social">
                        <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0"
                            target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/botanicabeautysalon/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://s.shopee.co.id/7Uy55fD1cE" target="_blank"><i
                                class="fas fa-shopping-bag"></i></a>
                    </div>
                    <div class="main-header__btn-box">
                        <a href="ourservices.html" class="thm-btn main-header__btn">Pesan Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="index2.html"><img src="{{ asset('images/resources/logo-1.png') }}"
                                alt="" /></a>
                    </div>
                </div>

                <div class="main-menu__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li class="dropdown">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('service') }}">Our Services</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('product.catalog') }}">Shop</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('blog.show') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>




                </div>
                <div class="main-menu__right">
                    <div class="main-menu__search-cart-box">
                        {{-- <div class="main-menu__search-box">
                            <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                        </div> --}}

                        {{-- <div class="main-menu__cart-box">
                <div class="dropdown">
                  <button
                    class="main-menu-four__cart shopping-cart"
                    data-bs-toggle="dropdown">
                    <i class="icon-shopping-cart"></i>
                    <span class="number">3</span>
                  </button>
                  <div class="dropdown-menu dropdown-cart">
                    <!-- Cart Content Start -->
                    <div class="cart-content">
                      <ul>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-1.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product1</a>
                              </h6>
                              <span class="product-price">Rp19.120</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-2.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product1</a>
                              </h6>
                              <span class="product-price">Rp19.120</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-3.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product3</a>
                              </h6>
                              <span class="product-price">Rp19.000</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-3.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product3</a>
                              </h6>
                              <span class="product-price">Rp19.000</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-3.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product3</a>
                              </h6>
                              <span class="product-price">Rp19.000</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                        <li>
                          <!-- Single Cart Item Start -->
                          <div class="single-cart-item">
                            <div class="cart-thumb">
                              <img
                                src="assets/images/mini-cart/cart-3.jpg"
                                alt="Cart" />
                              <span class="product-quantity">1x</span>
                            </div>
                            <div class="cart-item-content">
                              <h6 class="product-name">
                                <a href="#">Product3</a>
                              </h6>
                              <span class="product-price">Rp19.000</span>
                              <div class="attributes-content">
                                <!-- <span><strong>Color:</strong> White </span> -->
                              </div>
                              <button class="cart-remove">
                                <i class="material-icons">close</i>
                                <!-- Ikon silang dari Material Icons -->
                              </button>
                            </div>
                          </div>
                          <!-- Single Cart Item End -->
                        </li>
                      </ul>
                    </div>
                    <!-- Cart Content End -->

                    <!-- Cart Price Start -->
                    <div class="cart-price">
                      <div class="cart-total">
                        <div class="price-inline">
                          <span class="label">Total</span>
                          <span class="value">Rp49.700</span>
                        </div>
                      </div>
                    </div>
                    <!-- Cart Price Start -->

                    <div class="checkout-btn">
                      <a href="#" class="thm-btn2">Checkout</a>
                    </div>
                  </div>
                </div>
              </div> --}}
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index2.html" aria-label="logo image"><img src="{{ asset('images/resources/logo-3.png') }}"
                    width="90" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="salonbotanicabeauty@gmail.com">salonbotanicabeauty@gmail.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0">+62 889-7536-5090</a>
            </li>
        </ul>
        <!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0" target="_blank">
                    <i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/botanicabeautysalon/" target="_blank">
                    <i class="fab fa-instagram"></i></a>
                <a href="https://s.shopee.co.id/7Uy55fD1cE" target="_blank"><i class="fas fa-shopping-bag"></i></a>
            </div>
            <!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__top -->
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

{{-- <div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
      <form action="/search">
        <label for="search" class="sr-only">search here</label
        ><!-- /.sr-only -->
        <input type="text" id="search" placeholder="Search Here..." />
        <button type="submit" aria-label="search submit" class="thm-btn">
          <i class="icon-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <!-- /.search-popup__content -->
  </div> --}}

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>






{{-- <script>

 const cartContent = document.getElementById('cart-content');
 const MyCart = localStorage.getItem('Mycart')

 if (MyCart) {
    console.log(MyCart);
    MyCart.forEach(element => {

    });
}

</script> --}}
