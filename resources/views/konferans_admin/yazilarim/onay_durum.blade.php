<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Yazıların Onay Durumu</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Default Basic Forms Start -->
                    <div class="pd-20 card-box mb-30">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Alan</th>
                                <th scope="col">İletişim</th>
                                <th scope="col">Onay Durumu</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($yazilar as $yazi)
                                    @if($yazi->gonderildiMi == 1)
                                        <tr>
                                            <th scope="row">{{$yazi->id}}</th>
                                            <td>{{$yazi->yazar_adSoyad}}</td>
                                            <td>{{$yazi->yazi_alani}}</td>
                                            <td>{{$yazi->yazar_eposta}}</td>
                                            @if($yazi->onay_durum == 'Beklemede')
                                                <td><span class="badge badge-secondary">{{$yazi->onay_durum}}</span></td>
                                            @endif
                                            @if($yazi->onay_durum == 'Reddedildi')
                                                <td><span class="badge badge-danger">{{$yazi->onay_durum}}</span></td>
                                            @endif
                                            @if($yazi->onay_durum == 'Onaylandi')
                                                <td><span class="badge badge-success">{{$yazi->onay_durum}}</span></td>
                                            @endif
                                            @if($yazi->hakem_yorum)
                                                <td><abbr title="{{$yazi->hakem_yorum}}"><span class="icon-copy ti-comment-alt"></span></abbr></td>
                                            @endif
                                            @if(!$yazi->hakem_yorum)
                                            @endif

                                        </tr>

                                    @endif
                                @endforeach
                            </tbody>
                        </table>
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
