<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Konferans Yöneticisi Ekle</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Konferans Yöneticisi Ekle</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Default Basic Forms Start -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Yönetici Bilgileri</h4>
                                <p class="mb-30"></p>
                            </div>
                            @if(Session::has('message-phone'))
                                <div class=" alert alert-danger" role="alert">
                                    {{Session::get('message-phone')}}
                                </div>
                            @endif()
                        </div>

                        <!--######################################################################-->
                                                    <!--Form-->

                        <form action="{{route('yonetici.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Ad-Soyad</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="name" class="form-control" type="text" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Profil Resmi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="user_img" class="form-control" type="file" placeholder="...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Doğum Tarihi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="dogum_tarih" class="form-control date-picker" placeholder="Tarih Seçiniz" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Ünvan</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="unvan" class="custom-select col-12">
                                        <option selected="" value="Prof">Seçiniz...</option>
                                        <option value="Prof">Prof.</option>
                                        <option value="Prof.Dr">Prof.Dr.</option>
                                        <option value="Dr">Dr.</option>
                                        <option value="Öğr.Gör">Öğr.Gör.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Fakulte</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="fakulte" class="custom-select col-12">
                                        <option selected="" value="Mühendislik">Seçiniz...</option>
                                        <option value="Mühendislik">Mühendislik</option>
                                        <option value="Teknoloji">Teknoloji</option>
                                        <option value="Mimarlık">Mimarlık</option>
                                        <option value="İktisat">İktisat</option>
                                        <option value="Hukuk">Hukuk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Alanı</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="alani" required>
                                        <option selected="" value=" ">Seçiniz...</option>
                                        <option value="Uluslararası">Uluslararası</option>
                                        <option value="Politika">Politika</option>
                                        <option value="İşletme">İşletme</option>
                                        <option value="Eğitim">Eğitim</option>
                                        <option value="Sanat ve Tasarım">Sanat ve Tasarım</option>
                                        <option value="Teknoloji">Teknoloji</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Sifre</label>
                                <div class="col-sm-12 col-md-10 input-group">
                                    <input name="password" type="password" id="user_password" data-toggle="password"  class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Epostası</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="email" class="form-control" value="" placeholder="email@example.com" type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Telefonu</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="phone" class="form-control" value="" placeholder="10 haneli telefon numara giriniz lutfen (5555555555)" type="tel">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Oluştur</button>
                        </form>

                                                    <!--Form End-->

                        <!--######################################################################-->

                    </div>
                    <!-- Default Basic Forms End -->
                </div>
                <div class="footer-wrap pd-20 mb-20 card-box">
                    K.L.U Konferans ve Sempozyum  Düzenleme
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
