@extends('layouts.app')

@section('content')
    <div class="uk-flex-center uk-text-center uk-margin-large-top" uk-grid>
        <div class="uk-card uk-card-default" style="padding-left: 0 !important;">
            <div class="uk-card-header">
                <h3 class="uk-card-title">
                    {{ __('Register') }}
                </h3>
            </div>
            <div class="uk-card-body">
                <form method="POST" action="{{ route('register') }}" class="uk-form-stacked">
                    <fieldset class="uk-fieldset">
                        @csrf

                        <label for="name" class="uk-form-label">{{ __('Name') }}</label>
                        <div class="uk-form-controls">
                            <input id="name" type="text"
                                   class="uk-input uk-form-width-large @error('name') uk-form-danger @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        </div>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                        <label for="email"
                               class="uk-form-label">{{ __('E-Mail Address') }}</label>
                        <div class="uk-form-controls">
                            <input id="email" type="email"
                                   class="uk-input uk-form-width-large @error('email') uk-form-danger @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <label for="password"
                               class="uk-form-label">{{ __('Password') }}</label>

                        <div class="uk-form-controls">
                            <input id="password" type="password"
                                   class="uk-input uk-form-width-large @error('password') uk-form-danger @enderror"
                                   name="password"
                                   required autocomplete="new-password">

                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <label for="password-confirm"
                               class="uk-form-label">{{ __('Confirm Password') }}</label>

                        <div class="uk-form-controls">
                            <input id="password-confirm" type="password" class="uk-input uk-form-width-large"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="uk-card-footer">

            </div>
        </div>
    </div>
@endsection
