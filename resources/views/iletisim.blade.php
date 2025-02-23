<x-home-master>
@section('content')
    <main>
        <!-- banner kısmı -->
        <div class="page-hero-section bg-image hero-mini" style="background-image: url({{asset('images/duyurular_bg_.jpg')}});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h2 style="color: white">İletişim</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">İletişim</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- banner kısmı bitti -->
    </main>

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container" style="margin-bottom: 40px">
                <div class="row">
                    <div class="col-sm-7">
                        <h2>Bize Mesaj Gönderin</h2>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Ad-Soyad:</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">E-Posta:</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Konu:</label>
                                <input class="form-control" id="subject">
                            </div>
                            <div class="form-group">
                                <label for="message">Mesaj:</label>
                                <textarea class="form-control form-control-comment" id="message"></textarea>
                            </div>
                            <a class="btn-solid-reg popup-with-move-anim" href="#" style="margin-left: 260px; margin-top: 40px;">Gönder</a>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h2>İletişim Bilgileri</h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Adres</h3>
                                    <a href="https://www.google.com/maps/place/K%C4%B1rklareli+University/@41.794937,27.1689321,15.26z/data=!4m5!3m4!1s0x0:0xbd8fd67b626220af!8m2!3d41.7950057!4d27.1690101">Kayalı Kampüsü Merkez / KIRKLARELİ</a>
                                    <h3>E-Posta</h3>
                                    <a>kirklarelirektorluk@klu.edu.tr</a>
                                    <h3>Telefon</h3>
                                    <a>444 40 39</a>
                                    <h3>Fax</h3>
                                    <p> 0 (288) 212 96 79</p>
                                </div>
                            </div>
                        </div><!-- /.contact-info -->
                    </div>
                </div>
            </div>

        </section><!-- /.section-contact-us -->

    </main><!-- /#main -->
@endsection
</x-home-master>
