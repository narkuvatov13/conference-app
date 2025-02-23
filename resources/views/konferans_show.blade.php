<x-home-master>
    @section('content')
        <!-- s-content
    ================================================== -->
            <section class="s-content s-content--narrow s-content--no-padding-bottom">

                <article class="row format-standard">

                    <form action="{{route('basvuru.show',$konferans->id)}}" method="get">
                        @csrf
                        @if(Session::has('konferans-starting'))
                        <div class="alert alert-danger">
                            <h1>{{Session::get('konferans-starting')}}</h1>
                        </div>
                        @endif
                        <div class="s-content__header col-full">
                            <h1 class="s-content__header-title">
                                {{$konferans->konferans_baslik}}
                            </h1>
                            <ul class="s-content__header-meta">
                                <li class="date">Tarih: {{$konferans->konferans_tarih}}</li>
                                <li class="cat">
                                    In
                                    <strong>{{$konferans->konferans_kategori}}</strong>
                                </li>
                            </ul>
                        </div> <!-- end s-content__header -->

                        <div class="s-content__media col-full">
                            <div class="s-content__post-thumb">
                                <img src="{{$konferans->getPostImageAttribute($konferans->konferans_img)}}" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                            </div>
                        </div> <!-- end s-content__media -->

                        <div class="col-full s-content__main">
                            <p class="lead">{!! $konferans->konferans_icerik !!}</p>
                            <p class="s-content__tags">
                                <span>Post Tags</span>
                                @php
                                    $inputs=explode(',',$konferans->konferans_taglar)
                                @endphp
                                @foreach($inputs as $input)
                                    <span class="s-content__tag-list">
                                    <a href="#">{{$input}}</a>
                                </span>
                                @endforeach
                            </p> <!-- end s-content__tags -->
                            <button type="submit" class="btn-solid-reg">Başvuru Yap</button>
                        </div> <!-- end s-content__main -->
                    </form>
                </article>
            </section> <!-- s-content -->
    @endsection
</x-home-master>
