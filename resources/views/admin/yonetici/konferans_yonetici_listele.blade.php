<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Konferans Yöneticileri Listesi</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Konferans Yöneticileri Listesi</li>
                                        @if(Session::has('message-yonetici-store'))
                                        <li class="breadcrumb-item text-success">
                                            {{Session::get('message-yonetici-store')}}
                                        </li>
                                        @endif()@if(Session::has('message-yonetici-update'))
                                        <li class="breadcrumb-item text-success">
                                            {{Session::get('message-yonetici-update')}}
                                        </li>
                                        @endif()
                                        @if(Session::has('message-yonetici-delete'))
                                            <li class="breadcrumb-item text-danger">
                                                {{Session::get('message-yonetici-delete')}}
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
                                    <th class="table-plus datatable-nosort">Ad-Soyad</th>
                                    <th>Fakulte</th>
                                    <th>Ünvan</th>
                                    <th>İletişim</th>
                                    <th class="datatable-nosort">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->role_id == 2 && $user->silindiMi == 0)
                                        <tr>
                                                <td class="table-plus">{{$user->name}}</td>
                                                <td>{{$user->fakulte}}</td>
                                                <td>{{$user->unvan}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="{{route('yonetici.edit',$user->id)}}"><i class="dw dw-edit2"></i> Güncelle</a>

                                                            <form action="{{route('yonetici.destroy',$user->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="dropdown-item" type="submit">
                                                                    <i class="dw dw-delete-3"></i> Sil
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                        </tr>
                                    @endif()
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
