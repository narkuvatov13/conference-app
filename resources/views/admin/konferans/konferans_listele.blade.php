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
                                    <h4>Konferansler Listesi</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Konferansler Listesi</li>
                                        @if(Session::has('message-konferans-update'))
                                        <li class="breadcrumb-item text-success">
                                            {{Session::get('message-konferans-update')}}
                                        </li>
                                        @endif()
                                        @if(Session::has('message-konferans-delete'))
                                            <li class="breadcrumb-item text-danger">
                                                {{Session::get('message-konferans-delete')}}
                                            </li>
                                        @endif()
                                        @if(Session::has('message-konferans-store'))
                                            <li class="breadcrumb-item text-success">
                                                {{Session::get('message-konferans-store')}}
                                            </li>
                                        @endif()

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

                                @foreach($konferanslar as $konferans)
                                <tr>
                                    <td class="table-plus">{{$konferans->konferans_baslik}}</td>
                                    <td>{{$konferans->konferans_kategori}}</td>
                                    <td>{{$konferans->konferans_turu}}</td>
                                    <td>{{$konferans->konferans_tarih}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{route('konferans.edit',$konferans->id)}}"><i class="dw dw-edit2"></i> Düzenle</a>

                                                <form action="{{route('konferans.destroy',$konferans->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="dw dw-delete-3"></i> Sil
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- =====================  Content End ============================= -->






    @endsection
</x-admin-master>
