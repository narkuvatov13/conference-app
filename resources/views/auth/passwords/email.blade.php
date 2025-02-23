@extends('layouts.app')

@section('content')
    <section>
        <ul class="icon-list" style="margin-top: 100px">
            <li class="icon-item">
                <a href="{{route('home')}}" class="icon-link"><i class="fa fa-home"></i></a>
            </li>
        </ul>
    </section>
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt style="margin-top: -50px">
            <img src="{{asset('images/kirklareli-universitesi-logo.png')}}" alt="IMG">
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
            @csrf
					<span class="login100-form-title">
						Kayıt olduğunuz mail adresinizi giriniz
					</span>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    {{ __('Gönder') }}
                </button>
            </div>

            <div class="text-center p-t-136">

                @guest
                    @if (Route::has('register'))
                        <a class="txt2" href="{{ route('register') }}">
                            {{ __('Üye Ol') }}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true">
                            </i>
                        </a>
                    @endif
                @endguest
            </div>
        </form>
    </div>
@endsection
