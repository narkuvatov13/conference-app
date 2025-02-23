<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Gelen Yazılar</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('hakem_admin')}}">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Yazılar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-10">
                        </div>
                        <div class="pb-20">
                            <table class="data-table table stripe hover">
                                <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Başlık</th>
                                    <th>Ad Soyad</th>
                                    <th>Alan</th>
                                    <th class="datatable-nosort">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($yazilarim as $yazi)
                                        @if($yazi->onay_durum != 'Onaylandi' && $yazi->onay_durum != 'Rededildi')
                                            <tr>
                                                <td class="table-plus">{{$yazi->yazi_basligi}}</td>
                                                <td>{{$yazi->yazar_adSoyad}}</td>
                                                <td>{{$yazi->yazi_alani}}</td>
                                                <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{route('hakem-admin_gelen-yazilar.show',$yazi->id)}}"><i class="fa fa-eye"></i> Detaylı Bak</a>
                                            </div>
                                        </div>
                                    </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->

                </div><div class="footer-wrap pd-20 mb-20 card-box">
                    K.L.U Konferans ve Sempozyum  Düzenleme
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
