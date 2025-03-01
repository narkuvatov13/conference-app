<x-admin-master>
    @section('content')
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Konferanslara Yönetici Ata</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Konferanslara Yönetici Ata
                                        </li>
                                        @if(Session::has('message-seciniz'))
                                            <li class="breadcrumb-item text-danger">{{Session::get('message-seciniz')}}</li>
                                        @endif
                                        @if(Session::has('message-konferansAtandi'))
                                            <li class="breadcrumb-item text-success">{{Session::get('message-konferansAtandi')}}
                                            </li>
                                        @endif
                                        @if(Session::has('message-cikartildi'))
                                            <li class="breadcrumb-item text-danger">{{Session::get('message-cikartildi')}}</li>
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
                                        <th>Kategori</th>
                                        <th>Yöneticiler</th>
                                        <th class="datatable-nosort">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($konferanslar as $konferans)
                                        <tr>
                                            <form action="{{route('yoneticiKonferansaAta.update', $konferans->id)}}"
                                                method="post">
                                                @csrf
                                                @method('patch')
                                                <td class="table-plus">{{$konferans->konferans_baslik}}</td>
                                                <td>{{$konferans->konferans_kategori }} </td>
                                                <td>

                                                    @if($konferans->user->atandiMi == 1)
                                                        <div class="col-sm-12 col-md-10">
                                                            <select name="user_id" class="custom-select col-12" id="yoneticiler">
                                                                <option value="{{$konferans->user->id}}">{{$konferans->user->name}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    @endif

                                                    @if($konferans->user->atandiMi == 0)
                                                        <div class="col-sm-12 col-md-10">
                                                            <select name="user_id" class="custom-select col-12" id="yoneticiler">
                                                                <option selected="">Seçiniz...</option>

                                                                @foreach($users as $user)
                                                                    <option value="{{$user->id}}">{{ $user->name}}</option>
                                                                    @if($user->role_id == 2 && $user->alani == $konferans->konferans_kategori)
                                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif


                                                </td>
                                                <td>
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        @if($konferans->user->atandiMi == 0)
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="dw dw-user3"></i> Ata
                                                            </button>
                                                        @endif
                                                        @if($konferans->user->atandiMi == 1)
                                                            <a href="{{route('yoneticiKonferansaAta.destroy', $konferans->user->id)}}"
                                                                class="dropdown-item">
                                                                <i class="dw dw-delete-3"></i> Çıkart
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Simple Datatable End -->

                </div>
                <div class="footer-wrap pd-20 mb-20 card-box">
                    K.L.U Konferans ve Sempozyum Düzenleme
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>