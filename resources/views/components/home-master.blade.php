<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <title>Konferans</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">

    <!-- Css/ -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/anasayfa.css')}}" rel="stylesheet">
    <link href="{{asset('css/konferanslar.css')}}" rel="stylesheet">
    <link href="{{asset('css/util.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/iletisim.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/icerik.css')}}" rel="stylesheet" type="text/css">

    <!-- Css End -->
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/image.png')}}">
    <style>
        img,
        video {
            max-width: 100%;
            height: auto;
        }

        abbr[title] {
            border-bottom: none;
            text-decoration: underline;
            text-decoration: underline dotted;
        }

        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }

        .row {
            width: 94%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .row .row {
            width: auto;
            max-width: none;
            margin-left: -20px;
            margin-right: -20px;
        }

        @media only screen and (max-width: 1200px) {
            .row .row {
                margin-left: -15px;
                margin-right: -15px;
            }

            .col-full {
                width: 100%;
            }
        }
    </style>

</head>
<body data-spy="scroll" data-target=".fixed-top">

<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sync</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="{{url('/')}}"><img src="{{asset('images/logo2.png')}}" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{url('/')}}">Ana Sayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('konferanslar.index')}}">Konferanslar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#">Hakkimizda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{route('iletisim')}}">İletişim</a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('admin.index')}}">Admin</a>
                    </li>
                @endcan

                @can('konferans')
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('konferans_admin')}}">Admin</a>
                    </li>
                @endcan

                @can('hakem')
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('hakem_admin')}}">Admin</a>
                    </li>
                @endcan

                @can('yazar')
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{route('yazar_admin')}}">Admin</a>
                    </li>
                @endcan
            </ul>

            @if(!auth()->user())
            <span class="nav-item">
                <a class="btn-outline-sm page-scroll" href="login">Giriş Yap</a>
            </span>
            @endif
        </div>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->






@yield('content')



<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-col first">
                    <h5>Site Hakkında</h5>
                    <p class="p-small">Sync is a landing page HTML template built with Bootstrap 4 for presenting mobile apps</p>
                </div> <!-- end of footer-col -->
                <div class="footer-col second">
                    <h5>İletişim Bilgileri</h5>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li class="media">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="media-body"><a href="https://www.google.com/maps/place/K%C4%B1rklareli+University/@41.794937,27.1689321,15.26z/data=!4m5!3m4!1s0x0:0xbd8fd67b626220af!8m2!3d41.7950057!4d27.1690101">Kayalı Kampüsü Merkez / KIRKLARELİ</a></div>
                        </li>
                        <li class="media">
                            <i class="fas fa-envelope"></i>
                            <div class="media-body"><a href="#your-link">kirklarelirektorluk@klu.edu.tr</a></div>
                        </li>
                        <li class="media">
                            <i class="fas fa-phone-alt"></i>
                            <div class="media-body"><a href="#your-link">444 40 39</a></div>
                        </li>
                    </ul>
                </div> <!-- end of footer-col -->
                <div class="footer-col third">
                    <h5 style="width: 150px">Önerilen Siteler</h5>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li><a href="https://www.klu.edu.tr/" style="width: 150px">Kırklareli Üniversitesi</a></li>
                        <li><a href="https://kddb.klu.edu.tr/">K.L.U Merkez Kütüphane</a></li>
                        <li><a href="http://www.kirklareliteknokent.com.tr/">K.L.U Teknopark</a></li>
                    </ul>
                </div> <!-- end of footer-col -->
                <div class="footer-col fifth">
            <span class="fa-stack">
              <li>
                <a href="https://www.facebook.com/kirklaruni">
                  <i class="fab fa-facebook-f icon"></i>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/kirklaruni"><i class="fab fa-twitter icon"></i></a>
              </li>
              <li>
                <a href="https://tr.linkedin.com/company/k-rklareli-university"><i class="fab fa-linkedin-in icon"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/kirklar_uni/"><i class="fab fa-instagram icon"></i>
                </a>
              </li>
            </span>
                </div> <!-- end of footer-col -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->


<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © 2020 - All rights reserved</p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->


<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="{{asset('js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{asset('js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
<script src="{{asset('js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="{{asset('js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>

</html>
