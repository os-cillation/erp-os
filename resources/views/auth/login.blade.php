@extends('layouts.app')

@section('content')

    <div class="uk-flex-center uk-text-center uk-margin-large-top" uk-grid>
        <div class="uk-card uk-card-default" style="padding-left: 0 !important;">
            <div class="uk-card-header">
                <h3 class="uk-card-title">
                    {{ __('Login') }}
                </h3>
            </div>
            <div class="uk-card-body">
                <form method="POST" action="{{ route('login') }}">
                    <label class="uk-form-label">
                        {{ __('E-Mail Address') }}
                    </label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p><strong>{{ $message }}</strong></p>
                        </div>
                        @enderror
                    </div>

                    <label for="password"
                           class="uk-form-label">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="uk-input @error('password') uk-form-danger @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p><strong>{{ $message }}</strong></p>
                        </div>
                        @enderror
                    </div>

                    <div class="uk-form-controls uk-margin">
                        <input class="uk-checkbox" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="uk-form-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="uk-form-controls">
                        <button type="submit" class="uk-button uk-button-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="uk-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="uk-card-footer"></div>
        </div>
    </div>
@endsection
