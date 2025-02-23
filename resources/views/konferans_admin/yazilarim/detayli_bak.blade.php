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
                                        <li class="breadcrumb-item"><a href="{{route('yonetici_yazilarim_listele.index')}}">Yazılar</a></li>
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
                                        <div class="blog-img">
                                            <img src="{{$yazi->getPostImageAttribute($yazi->yazi_img)}}" alt="image Bulunamadi">
                                        </div>
                                        <div class="blog-caption">

                                            <p>{!!$yazi->yazi_icerik!!}</p>
                                            <hr>
                                            <h5>Yazar dosyası</h5>
                                            @if($yazi->yazi_dosya)
                                                    <p>Yazarın gönderdiği dosyaya <a href="{{$yazi->getPostFileAttribute($yazi->yazi_dosya)}}" style="color: #1b00ff">buradan</a> erişebilirsiniz.</p>
                                                @else
                                                    <p>Dosya Yuklenmedi</p>
                                            @endif
                                        </div>
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
