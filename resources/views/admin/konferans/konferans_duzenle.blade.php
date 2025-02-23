<x-admin-master>
    @section('content')
        <!-- =====================  Content ============================= -->
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>konferans_baslik</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">konferans_kategori</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Default Basic Forms Start -->
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Konferans Bilgileri</h4>
                                <p class="mb-30"></p>
                            </div>
                        </div>

                        <!--################# Form #########################-->

                        <form action="{{ route('konferans.update',$konferans->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Konferans Başlığı</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="konferans_baslik" placeholder="..." value="{{$konferans->konferans_baslik}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Konferans Resimi</label>
                                <div class="col-sm-12 col-md-10">
                                    <img src="{{ $konferans->getPostImageAttribute($konferans->konferans_img)}}" width="100" style="margin-bottom: 10px;" alt="">
                                    <input class="form-control" type="file" name="konferans_img" placeholder="..." value="{{ $konferans->konferans_img}}'">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Konferans Kategorisi</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="konferans_kategori">
                                        <option selected="" value="{{$konferans->konferans_kategori}}">{{ $konferans->konferans_kategori}}</option>
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
                                <label class="col-sm-12 col-md-2 col-form-label">Tarih</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control date-picker" name="konferans_date" value="{{ $konferans->konferans_tarih}}" placeholder="Tarih Seçiniz" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Zaman</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control time-picker" name="konferans_zaman" value="{{ $konferans->konferans_zaman}}" placeholder="Zaman Seçiniz" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Konferans Türü</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="konferans_turu">
                                        <option selected="{{ $konferans->konferans_turu}}">{{ $konferans->konferans_turu}}</option>
                                        <option value="Online">Online</option>
                                        <option value="Yüz yüze">Yüz yüze</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Adres ya da URL</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="konferans_adres" value="{{ $konferans->konferans_adres}}" placeholder="https://microsoft.com" type="url">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İçerik</label>
                                <div class="html-editor pd-20 card-box" style="margin-left: 15px">
                                    <textarea  class="textarea_editor form-control border-radius-0" name="konferans_icerik" placeholder="İçerik kısmını buraya yazınız..." >
                                            {{ $konferans->konferans_icerik}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Tag Ekleyin</label>
                                <div style="margin-left: 15px">
                                    <p style="font-size: 18px; font-weight: 600;">her tag sonrasında virgül koymayı unutmayın</p>
                                    <input type="text" name="konferans_taglar" value="{{ $konferans->konferans_taglar}}" data-role="tagsinput" placeholder="tag ekleyin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Epostası</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="konferans_email" value="{{ $konferans->konferans_email}}" placeholder="email@example.com" type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">İletişim Telefonu</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="konferans_tel" value="{{ $konferans->konferans_tel}}" placeholder="5555555555" type="tel">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Duzenle</button>
                        </form>

                        <!--################# Form #########################-->



                    </div>
                    <!-- Default Basic Forms End -->
                </div>
            </div>
        </div>
        <!-- =====================  Content End ============================= -->
    @endsection

</x-admin-master>
