<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Oluşturduğum Yazılar</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Yazılarım</li>
                                        @if(Session::has('message-yazilarim-delete'))
                                            <li class="breadcrumb-item active text-danger" aria-current="page">
                                                {{Session::get('message-yazilarim-delete')}}
                                            </li>
                                        @endif
                                        @if(Session::has('message-yazilarim-update'))
                                            <li class="breadcrumb-item active text-success" aria-current="page">
                                                {{Session::get('message-yazilarim-update')}}
                                            </li>
                                        @endif
                                        @if(Session::has('message-yazilarim-create'))
                                            <li class="breadcrumb-item active text-success" aria-current="page">
                                                {{Session::get('message-yazilarim-create')}}
                                            </li>
                                        @endif
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
                                    <th>Alan</th>
                                    <th class="datatable-nosort">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($yazilarim as $yazilar)
                                         @if($yazilar->silindiMi == 0)
                                            <tr>
                                                <td class="table-plus">{{$yazilar->yazi_basligi}}</td>
                                                <td>{{$yazilar->yazi_alani}}</td>
                                                <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{route('yazar_admin_basvuru.edit',$yazilar->id)}}"><i class="dw dw-edit2"></i> Düzenle</a>
                                                <form action="{{route('yazar_admin_basvuru.destroy',$yazilar->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item"><i class="fa fa-trash-o"></i>Sil</button>
                                                </form>
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
