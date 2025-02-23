<x-home-master>
@section('content')
    <main>
        <!-- banner kısmı -->
        <div class="page-hero-section bg-image hero-mini" style="background-image: url(images/duyurular_bg_.jpg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h2 style="color: white">Konferanslar</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Konferanslar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- banner kısmı bitti -->


        <!-- içerik kısmı -->
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 py-3">
                        @foreach($konferanslar as $konferans)
                            @if($konferans->silindiMi == 0)
                                 <article class="blog-entry">
                                     <div class="entry-header">
                                <div class="post-thumbnail">
                                    <img src="{{asset($konferans->getPostImageAttribute($konferans->konferans_img))}}" alt="">
                                </div>
                                <div class="post-date">
                                    <h3>{{$konferans->getGun($konferans->konferans_tarih)}}</h3>
                                    <span>
                                        {{$konferans->getAy($konferans->konferans_tarih)}}
                                    </span>
                                </div>
                            </div>
                                     <div class="post-title"><a href="#">
                                    <strong>{{$konferans->konferans_baslik}}</strong>
                                </a></div>
                                     <div class="entry-meta mb-2">
                                <div class="meta-item entry-author">
                                    <div class="icon">
                                        <span class="fas fa-user"></span>
                                    </div>
                                    by <a href="#">Admin</a>
                                </div>
                                <div class="meta-item">
                                    <div class="icon">
                                        <span class="fas fa-list-ul"></span>
                                    </div>
                                    Category:
                                    <strong>{{$konferans->konferans_kategori}}</strong>
                                </div>
                            </div>
                                     <div class="entry-content">
                                <p>
                                    {!! Str::limit($konferans->konferans_icerik,'100','     . . .   ') !!}
                                </p>
                            </div>
                                     <a href="{{route('konferanslar.show',$konferans->id)}}" class="btnDetayliBak">Detaylı Bak
                                <i class="fa fa-arrow-right"></i>
                            </a>
                                     <p class="text-right">{{$konferans->created_at->diffForHumans()}}</p>
                                </article>
                            @endif
                        @endforeach
                    </div> <!-- içerik kısmı bitti -->

                    <!-- Sidebar -->
                    <div class="col-lg-4 py-3">
                        <!-- arama kısmı -->
                        <form class="aramafrm" action="#">
                            <div id="cover">
                                <form method="get" action="">
                                    <div class="tb">
                                        <div class="td">
                                            <input class="aramainpt" type="text" placeholder="..." required>
                                        </div>
                                        <div class="td" id="s-cover">
                                            <button class="aramabtn" type="submit">
                                                <div id="s-circle"></div>
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form> <!-- arama kısmı bitti -->

                        <!-- kategoriler kısmı -->
                        <div class="widget-wrap">
                            <h3 class="widget-title">Kategori</h3>
                            <ul class="categories">
                                <li><a href="#">Uluslararası Konferanslar <span>12</span></a></li>
                                <li><a href="#">Politik Konferanslar <span>22</span></a></li>
                                <li><a href="#">İşletme Konferansları <span>37</span></a></li>
                                <li><a href="#">Eğitim Konferansları <span>42</span></a></li>
                                <li><a href="#">Sanat-Tasarım Konferansları <span>14</span></a></li>
                                <li><a href="#">Teknoloji Konferansları <span>140</span></a></li>
                            </ul>
                        </div><!-- kategoriler kısmı bitti -->

                        <!-- sıralama kısmı -->
                        <div class="widget-wrap">
                            <h3 class="widget-title">Sıralama</h3>
                            <div class="siralama">
                                <div class="container">
                                    <input type="radio" class="hidden" id="input1" name="inputs">
                                    <label class="entry" for="input1">
                                        <div class="circle"></div>
                                        <div class="entry-label">Yakında</div>
                                    </label>
                                    <input type="radio" class="hidden" id="input2" name="inputs">
                                    <label class="entry" for="input2">
                                        <div class="circle"></div>
                                        <div class="entry-label">Yeni Eklenenler</div>
                                    </label>
                                    <input type="radio" class="hidden" id="input3" name="inputs">
                                    <label class="entry" for="input3">
                                        <div class="circle"></div>
                                        <div class="entry-label">Gerçekleşenler</div>
                                    </label>
                                    <div class="highlight"></div>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                            <br>
                            <section class="siralama2">
                                <input id='one' type='checkbox' />
                                <label for='one'>
                                    <span></span>
                                    Online Platform <ins><i>Online Platform</i></ins>
                                </label>
                                <input id='two' type='checkbox' />
                                <label for='two'>
                                    <span></span>
                                    Yüz Yüze <ins><i>Yüz Yüze</i></ins>
                                </label>
                            </section>
                            <!-- anahtar kelimeler kısmı -->
                            <div class="tag-clouds">
                                <a href="#" class="tag-cloud-link">yapay zeka</a>
                                <a href="#" class="tag-cloud-link">web</a>
                                <a href="#" class="tag-cloud-link">işletme</a>
                                <a href="#" class="tag-cloud-link">finans</a>
                                <a href="#" class="tag-cloud-link">dil</a>
                                <a href="#" class="tag-cloud-link">tasarım</a>
                                <a href="#" class="tag-cloud-link">politika</a>
                                <a href="#" class="tag-cloud-link">eğitim</a>
                                <a href="#" class="tag-cloud-link">sempozyum</a>
                                <a href="#" class="tag-cloud-link">doğa</a>
                                <a href="#" class="tag-cloud-link">nano-teknoloji</a>
                            </div><!-- anahtar kelimeler kısmı bitti -->
                            <a href="#" class="btnDetayliBak" style="margin-top: 40px">Sırala
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div><!-- sıralama kısmı bitti -->
                    </div> <!-- end sidebar -->
                </div>
            </div>
        </div>
    </main>
@endsection
</x-home-master>
