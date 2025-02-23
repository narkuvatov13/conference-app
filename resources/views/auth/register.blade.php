@extends('layouts.app')

@section('content')
    <section>
        <ul class="icon-list" style="margin-top: 45px">
            <li class="icon-item">
                <a href="{{route('home')}}" class="icon-link"><i class="fa fa-home"></i></a>
            </li>
        </ul>
    </section>
    <div class="wrap-login100 wrap-signup100">
        <div class="login100-pic js-tilt" data-tilt style="margin-top: 100px">
            <img src="images/kirklareli-universitesi-logo.png" alt="IMG">
        </div>

        <form  method="POST" action="{{ route('register') }}" class="login100-form validate-form mt-5">
            @csrf
					<span class="login100-form-title">
						Üye Ol
					</span>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ad-soyad">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-regular fa-user"></i>
                </span>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="text" name="phone" placeholder="Phone">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-duotone fa-phone"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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

            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    {{ __('Üye Ol') }}
                </button>
            </div>

            <div class="text-center p-t-90">
                @guest
                    @if (Route::has('login'))
                        <a class="txt2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    @endif
                @endguest
            </div>
        </form>
    </div>
@endsection
