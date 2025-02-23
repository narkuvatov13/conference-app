<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Başvuru Formu</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Başvuru Formu</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Default Basic Forms Start -->
                    <div class="pd-20 card-box mb-30">

                        @isset($yonetici_admin)
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-blue h4">Kişisel Bilgiler</h4>
                                    <p class="mb-30"></p>
                                </div>
                            </div>
                            <form action="{{route('yazar_admin.store')}}" method="POST" enctype=multipart/form-data>
                            @csrf
                            <input type="hidden" name="user_id" value="{{$yonetici_admin->id}}">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Ad-Soyad</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazar_adSoyad" type="text" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Profil Resmi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazar_img" type="file" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Üniversite | Şİrket</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazar_universiteSirket" type="text" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Epostası</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control"name="yazar_eposta" placeholder="email@example.com" type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Telefonu</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazar_telNo"  placeholder="1-(111)-111-1111" type="tel">
                                </div>
                            </div>
                        </div>
                            <div class="pd-20 card-box mb-30">
                             <div class="clearfix">
                                 <div class="pull-left">
                                <h4 class="text-blue h4">Yazı İçeriği</h4>
                                <p class="mb-30"></p>
                                </div>
                             </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Yazı Başlığı</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazi_basligi" type="text" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Yazı Resmi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazi_img" type="file" placeholder="...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Yazı Alanı</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazi_alani" type="text" placeholder="teknoloji, sanat ve tasarım, tıp, ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İçerik</label>
                                <div class="html-editor pd-20 card-box" style="margin-left: 15px">
                                    <textarea class="textarea_editor form-control border-radius-0" name="yazi_icerik" placeholder="İçerik kısmını buraya yazınız..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Sunum Dosyası</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="yazi_dosya" type="file" placeholder="...">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Başvuru Yap</button>
                        </form>
                    </div>
                        @endisset
                    <!-- Default Basic Forms End -->
                </div>

                <div class="footer-wrap pd-20 mb-20 card-box">
                    K.L.U Konferans ve Sempozyum  Düzenleme
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
