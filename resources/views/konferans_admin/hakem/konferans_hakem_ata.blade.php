<x-admin-master>
    @section( 'content' )
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>Konferanslara Hakem Ata</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Konferanslara Hakem Ata</li>
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
                                   <!-- <th>Atandimi</th> -->
                                    <th>Hakemler</th>
                                    <th class="datatable-nosort">İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($konferanslar as $konferans)
                                    <tr>
                                    <form action="{{route('hakemKonferansaAta.store',$konferans->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <td class="table-plus">{{$konferans->konferans_baslik}}</td>
                                            <td>{{$konferans->konferans_kategori }}</td>
                                        <!--
                                             @foreach($konferans->hakemYoneticUsers  as $hakem)
                                                @if($hakem->role_id == 3 && $konferans->konferans_kategori == $hakem->alani)
                                                    <td>
                                                            <h6 class="text-success">Atandi</h6>
                                                            @break
                                                    </td>
                                                @endif
                                            @endforeach
                                        <td>
                                        @foreach($users as $user)
                                            @if($user->role_id == 3 && $konferans->konferans_kategori == $user->alani && $user->atandiMi == 0)
                                                        <h6 class="text-danger">Atanmadi</h6>
                                                        @break
                                            @endif
                                        @endforeach
                                        </td>
                                        -->
                                        <td>
                                                <div class="col-sm-12 col-md-10">
                                                    <select name="user_id[]" class="custom-select col-12" id="yoneticiler">
                                                        <!--Atanan Hakem ler gelir-->
                                                        <optgroup label="Atananlar">
                                                            @foreach($konferans->hakemYoneticUsers  as $hakem)
                                                                @if($hakem->role_id == 3 && $konferans->konferans_kategori == $hakem->alani)
                                                                    <option value="{{$hakem->id}}">{{$hakem->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Atanmayanlar">
                                                                @foreach($users  as $user)
                                                                    @foreach($konferans->hakemYoneticUsers  as $hakem)
                                                                        @php
                                                                            $isHakem =$hakem->id
                                                                        @endphp
                                                                        @break($hakem)
                                                                    @endforeach
                                                                        @if($user->role_id == 3 && $konferans->konferans_kategori == $user->alani)
                                                                            @continue($isHakem == $user->id)
                                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                                        @endif
                                                                @endforeach
                                                        </optgroup>
                                                        <!-- Bir Hakem Birden fazla konferansa atanabilirmi
                                                        <optgroup label="Atananlar">
                                                            @foreach($konferans->hakemYoneticUsers  as $hakem)
                                                                @if($hakem->role_id == 3 && $konferans->konferans_kategori == $hakem->alani && $hakem->atandiMi == 1)
                                                                    <option value="{{$hakem->id}}">{{$hakem->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Atanmayanlar">
                                                            @foreach($users  as $user)
                                                                @if($user->role_id == 3 && $konferans->konferans_kategori == $user->alani && $user->atandiMi == 0)
                                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                        -->
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <button type="submit"  class="dropdown-item">
                                                            <i class="dw dw-user3"></i> Ata
                                                        </button>
                                                        <a href="{{route('hakemKonferansaAta.destroy',$konferans->id)}}" class="dropdown-item">
                                                            <i class="dw dw-delete-3"></i> Cikar
                                                        </a>
                                                    </div>
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

                </div><div class="footer-wrap pd-20 mb-20 card-box">
                    K.L.U Konferans ve Sempozyum  Düzenleme
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
