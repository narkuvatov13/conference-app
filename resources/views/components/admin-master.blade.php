<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Admin Paneli | Konferans ve Sempozyum Düzenleme</title>



    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script type="text/javascript"
            src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>





    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/vendors/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/vendors/images/kirklareli-universitesi-logo.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/vendors/images/kirklareli-universitesi-logo.png')}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/styles/style.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>


<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>

    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{asset('admin/vendors/images/img.jpg')}}" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('admin/vendors/images/photo1.jpg')}}" alt="">
                                    <h3>Lea R. Frith</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('admin/vendors/images/photo2.jpg')}}" alt="">
                                    <h3>Erik L. Richards</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                            <li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
              <img src="{{asset('admin/vendors/images/photo1.jpg')}}" alt="">
            </span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>


                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{asset('admin/vendors/images/logo2.png')}}" alt="" class="dark-logo">
            <img src="{{asset('admin/vendors/images/logo2.png')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>



    <div class="menu-block customscroll">
        <div class="sidebar-menu">

       <!--*********************** Admin Navigation Content Begin *******************************************-->

            @can('admin')
                <ul id="accordion-menu">

                <li>
                    <a href="{{url('/')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Anasayfa</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-conference"></span><span class="mtext">Konferans</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('konferans.create')}}">Oluştur</a></li>
                        <li><a href="{{route('konferans.index')}}">Listele</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit1"></span><span class="mtext">Yönetici</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('yoneticiKonferansaAta.index')}}">Konferansa Ata</a></li>
                        <li><a href="{{route('yonetici.index')}}">Listele</a></li>
                        <li><a href="{{route('yonetici.create')}}">Ekle</a></li>
                    </ul>
                </li>

                <!--<li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-hammer-1"></span><span class="mtext">Hakem</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('hakemKonferansaAta.index')}}">Konferansa Ata</a></li>
                        <li><a href="{{route('hakem.index')}}">Listele</a></li>
                        <li><a href="{{route('hakem.create')}}">Ekle</a></li>
                    </ul>
                </li>
            </ul> -->
            @endcan

        <!--*********************** Admin Navigation Content  End *******************************************-->

        <!--#############################################################################################-->

        <!--*********************** Konferans Baskani Navigation Content Begin *******************************************-->

            @can('konferans')
                <ul id="accordion-menu">

                    <li>
                        <a href="{{url('/')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Anasayfa</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-conference"></span><span class="mtext">Konferans</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('yonetici_konferans.edit',Auth::user()->konferans_id)}}">Düzenle</a></li>
                            <li><a href="{{route('yonetici_konferans_aktif_pasif.index')}}">Aktif|Pasif</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-balance-scale"></span><span class="mtext">Hakem</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('hakem.create')}}">Oluştur|Ata</a></li>
                            <li><a href="{{route('hakem.index')}}">Güncelle|Sil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-files-o"></span><span class="mtext">Yazılar</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('yonetici_yazilarim_listele.index')}}">Listele</a></li>
                            <li><a href="{{route('yonetici_yazilarim_hakeme_gonder_listele.index')}}">Hakeme Gönder</a></li>
                            <li><a href="{{route('yonetici_yazilarim_onayDurum.index')}}">Onay Durumu</a></li>
                        </ul>
                    </li>

                    <!--
                    <li>
                        <a href="{{url('/')}}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-wpforms"></span><span class="mtext">Başvuru Formu</span>
                        </a>
                    </li>
                    -->
            @endcan

        <!--*********************** Konferans Baskani Navigation Content End *******************************************-->

        <!--#############################################################################################-->

        <!--*********************** hakem Navigation Content Begin *******************************************-->

               @can('hakem')
                       <ul id="accordion-menu">

                           <li>
                               <a href="{{url('/')}}" class="dropdown-toggle no-arrow">
                                   <span class="micon dw dw-house-1"></span><span class="mtext">Anasayfa</span>
                               </a>
                           </li>

                           <li class="dropdown">
                               <a href="javascript:;" class="dropdown-toggle">
                                   <span class="micon fa fa-files-o"></span><span class="mtext">Yazilar</span>
                               </a>
                               <ul class="submenu">
                                   <li><a href="{{route('hakem-admin_gelen-yazilar.index')}}">Gelen Yazilar</a></li>
                               </ul>
                           </li>
                       </ul>
                @endcan

       <!--*********************** hakem Navigation Content  End *******************************************-->

       <!--#############################################################################################-->

       <!--*********************** Yazar Navigation Content Begin *******************************************-->
            @can('yazar')
                <ul id="accordion-menu">
                    <li>
                        <a href="{{url('/')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Anasayfa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('yazar_admin.create')}}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-wpforms"></span><span class="mtext">Başvuru Formu</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-files-o"></span><span class="mtext">Yazılarım</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('yazar_admin.index') }}">Listele</a></li>
                        </ul>
                    </li>
                </ul>
            @endcan

       <!--*********************** Yazar Navigation Content  End *******************************************-->


        </div>
    </div>
</div>






<div class="mobile-menu-overlay"></div>
<!-- =====================  Content ============================= -->
@yield('content')
<!-- =====================  Content End ============================= -->
<script src="{{asset('admin/vendors/scripts/core.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/process.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('admin/vendors/scripts/datatable-setting.js')}}"></script>


<script src="{{asset('admin/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/buttons.print.min.js.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/buttons.html5.min.js.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script>


<script src="{{asset('admin/vendors/scripts/dashboard.js')}}"></script>
<script  src="{{asset('js/bootstrap-show-password.js')}}"></script>
</body>

</html>
