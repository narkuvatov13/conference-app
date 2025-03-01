@extends('layouts.app')

<!-- container-login100 -->
@section('content')

    <section>
        <ul class="icon-list" style="margin-top: 15px">
            <li class="icon-item">
                <a href="{{route('home')}}" class="icon-link"><i class="fa fa-home"></i></a>
            </li>
        </ul>
    </section>
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="images/kirklareli-universitesi-logo.png" alt="IMG">
        </div>


        <!--############## Form #################### -->
        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">

            @csrf
            <span class="login100-form-title">
                Giriş Yap
            </span>
            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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
                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">
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
            <!--  <div class="center">
                                                                                                                        <select name="role_id" id="rol" class="custom-select" placeholder="Rolünüzü Seçin" style="border:none;">
                                                                                                                            <option value="4"></option>
                                                                                                                            <option value="1">Sistem Yöneticisi</option>
                                                                                                                            <option value="2">Konferans Başkanı</option>
                                                                                                                            <option value="3">hakem</option>
                                                                                                                            <option value="4">Yazar</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                   -->
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="text-center p-t-12">

                @if (Route::has('password.request'))
                    <span class="txt1">
                        Unuttum
                    </span>
                    <a class="txt2" href="{{ route('password.request') }}">
                        {{ __('Şifre?') }}
                    </a>
                @endif
            </div>
            <div class="text-center">
                @guest
                    @if (Route::has('register'))
                        <a class="txt2" href="https://github.com/narkuvatov13/conference-app" target="_blank">
                            {{ __('Already For Username and Password') }}
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true">
                            </i>
                        </a>
                    @endif
                @endguest
            </div>

            <div class="text-center m-t-96">
                @guest
                    @if (Route::has('register'))
                        <a class="txt2" href="{{ route('register') }}">{{ __('Üye Ol') }} <i class="fa fa-long-arrow-right m-l-5"
                                aria-hidden="true"></i></a>
                    @endif
                @endguest
            </div>

        </form>
        <!-- Form End -->
    </div>







@endsection