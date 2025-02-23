<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>{{$user->name}}</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">{{$user->fakulte}}</li>
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
                        </div>
                        <form action="{{route('yonetici.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Ad-Soyad</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="name" value="{{$user->name}}" type="text" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label"></label>
                                <div class="col-sm-12 col-md-10">
                                    <img src="{{$user->getPostImageAttribute($user->user_img)}}" width="100px" alt="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Profil Resmi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="user_img" value="{{$user->user_img}}" type="file" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Doğum Tarih</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control date-picker" name="dogum_tarih" value="{{$user->dogum_tarih}}" placeholder="Tarih Seçiniz" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Ünvan</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="unvan" class="custom-select col-12">
                                        <option selected="" value="{{$user->unvan}}">{{$user->unvan}}</option>
                                        <option value="Prof">Prof.</option>
                                        <option value="Prof.Dr">Prof.Dr.</option>
                                        <option value="Dr">Dr.</option>
                                        <option value="Öğr.Gör">Öğr. Gör.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Fakulte</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="fakulte" class="custom-select col-12">
                                        <option selected="" value="{{$user->fakulte}}">{{$user->fakulte}}</option>
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
                                        <option selected="" value="{{$user->alani}}">{{$user->alani}}</option>
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
                                    <input name="password" type="password" id="user_password" data-toggle="password"  class="form-control" placeholder="New Password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Epostası</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="email" class="form-control" value="{{$user->email}}" placeholder="email@example.com" type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Telefonu</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="phone" class="form-control" value="{{$user->phone}}" placeholder="10 haneli telefon numara giriniz lutfen (5555555555)" type="tel">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Guncelle</button>
                        </form>

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
