<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Atandığım Konferanslar</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Atandığım Konferanslar</li>
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
                                    <th>Kategori</th>
                                    <th>Tür</th>
                                    <th>Tarih</th>
                                    <th class="datatable-nosort">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="table-plus">{{$konferans->konferans_baslik}}</td>
                                    <td>{{$konferans->konferans_kategori}}</td>
                                    <td>{{$konferans->konferans_turu}}</td>
                                    <td>{{$konferans->konferans_date}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <form method="post" action="{{route('yonetici_konferans.destroy',$konferans->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    @if($konferans->silindiMi == 1)
                                                        <button type="submit" class="dropdown-item"><i class="fa fa-unlock"></i>Aktif</button>
                                                    @endif
                                                    @if($konferans->silindiMi == 0)
                                                        <button type="submit" class="dropdown-item"><i class="fa fa-lock"></i>Pasif</button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
    @endsection()
</x-admin-master>
