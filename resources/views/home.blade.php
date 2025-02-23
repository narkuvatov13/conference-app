<x-home-master>
@section('content')
    <!-- Header -->
    <header class="header">

        <!-- carousel slider -->
        <div class="container">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner shadow border-r">
                        <div class="carousel-item height active">
                            <img class="d-block w-100 m-auto s-img" src="{{asset('images/konf1.jpg')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block alignt ">
                                <h1 style="font-size: 50px; color: aliceblue;">Konferans ve Sempozyum</h1>
                                <p style="font-size: 20px; color: aliceblue">Kırklareli Üniversitesi</p>
                                <span class="nav-item">
                                  <a class="btn-outline-sm page-scroll m-4" href="#download">Daha Fazla</a>
                              </span>
                            </div>
                        </div>
                        <div class="carousel-item height ">
                            <img class="d-block w-100 m-auto s-img" src="{{asset('images/konf2.jpeg')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block alignt">
                                <h1 style="font-size: 50px; color: aliceblue;">Konferans ve Sempozyum</h1>
                                <p style="font-size: 20px; color: aliceblue">Kırklareli Üniversitesi</p>
                                <span class="nav-item">
                                  <a class="btn-outline-sm page-scroll m-4" href="#download">Daha Fazla</a>
                              </span>
                            </div>
                        </div>
                        <div class="carousel-item height">
                            <img class="d-block w-100 m-auto s-img" src="{{asset('images/konf3.jpeg')}}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block alignt">
                                <h1 style="font-size: 50px; color: aliceblue;">Konferans ve Sempozyum</h1>
                                <p style="font-size: 20px; color: aliceblue">Kırklareli Üniversitesi</p>
                                <span class="nav-item">
                                  <a class="btn-outline-sm page-scroll m-4" href="#download">Daha Fazla</a>
                              </span>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> <!-- end of carousel slider -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Description 1 -->
        <div id="description" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{asset('images/basvuruyap.png')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2>Organize Your Time And Start Getting Results</h2>
                            <p>Sync is the first mobile app on the market to harness the power of social connections to help you stop procrastinating and start getting things done. Give it a try and see the changes right away</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Analyse and evaluate your current status and productivity</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Begin monitoring your day to day routine with Sync app</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">See the improved results in no more than a couple of weeks</div>
                                </li>
                            </ul>
                            <a class="btn-solid-reg" href="konferanslar.php">Başvuru Yap</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of basic-1 -->
        <!-- end of description 1 -->



        <!-- Description 2 -->
        <div id="description" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2>Organize Your Time And Start Getting Results</h2>
                            <p>Sync is the first mobile app on the market to harness the power of social connections to help you stop procrastinating and start getting things done. Give it a try and see the changes right away</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Analyse and evaluate your current status and productivity</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Begin monitoring your day to day routine with Sync app</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">See the improved results in no more than a couple of weeks</div>
                                </li>
                            </ul>
                            <a class="btn-solid-reg" href="#">Hakkımızda</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{asset('images/hakkimizda.png')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of basic-1 -->
        <!-- end of description 1 -->



        <!-- Statistics -->
        <div class="counter" style="background-image: url({{asset('images/konf11.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Counter -->
                        <div id="counter">
                            <div class="cell">
                                <i class="fas fa-users"></i>
                                <div class="counter-value number-count" data-count="63">1</div>
                                <p class="counter-info">Kayıtlı Kullanıcılar</p>
                            </div>
                            <div class="cell">
                                <i class="fas fa-user-plus green"></i>
                                <div class="counter-value number-count" data-count="385">1</div>
                                <p class="counter-info">Toplam Katılımcılar</p>
                            </div>
                            <div class="cell">
                                <i class="fas fa-download blue"></i>
                                <div class="counter-value number-count" data-count="87">1</div>
                                <p class="counter-info">Yüklenen Duyurular</p>
                            </div>
                        </div>
                        <!-- end of counter -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of counter -->
        <!-- end of statistics -->
    @endsection
</x-home-master>
