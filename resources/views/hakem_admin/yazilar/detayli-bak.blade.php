<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="title">
                                    <h4>{{$yazi->yazi_basligi}}</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('hakem-admin_gelen-yazilar.index')}}">Yazılar</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Gelen Yazılar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="blog-wrap">
                        <div class="container pd-0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="blog-detail card-box overflow-hidden mb-5">
                                        @empty($yazi->yazi_img)
                                            <h1 class="text-danger">Resim Bulunamadi</h1>
                                        @endempty
                                        <div class="blog-img">
                                            <img src="{{$yazi->getPostImageAttribute($yazi->yazi_img)}}" alt="">
                                        </div>

                                        <div class="blog-caption">
                                            <p>{!! $yazi->yazi_icerik !!}</p>
                                            <h5>Yazar dosyası</h5>
                                            <p>Yazarın gönderdiği dosyaya
                                                @if($yazi->yazi_dosya)
                                                    <a href="{{asset('storage/'.$yazi->yazi_dosya)}}" style="color:#412afd">buradan</a> erişebilirsiniz.
                                                @endif
                                                @if(!$yazi->yazi_dosya)
                                                    <h5 class="text-danger">Dosya Bulunamadi</h5>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-wrap">
                        <div class="container pd-0">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="blog-detail card-box overflow-hidden mb-30">
                                        <form action="{{route('hakem-admin_gelen-yazilar.update',$yazi->id)}}" method="post">
                                            <div class="blog-caption">
                                                @csrf
                                                @method('patch')
                                                    <div class="form-group">
                                                        <textarea class="form-control mt-3" name="yorum" placeholder="Yorumunuzu buraya yazınız"></textarea>
                                                    </div>
                                                    <button type="submit" name="onaylandi" value="onaylandi" class="btn btn-outline-success col-5" style="margin-right: 175px">Onayla</button>
                                                    <button type="submit" name="rededildi" value="rededildi" class="btn btn-outline-danger col-5">Reddet</button>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-wrap pd-20 mb-20 card-box">
                        K.L.U Konferans ve Sempozyum  Düzenleme
                    </div>
                </div>
            </div>
    @endsection
</x-admin-master>
