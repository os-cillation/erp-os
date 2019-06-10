@extends('layouts.app')

@section('content')
    <div class="uk-flex-center uk-margin-large-top" uk-grid>
        <div class="uk-card uk-card-default" style="padding-left: 0 !important;">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <div class="uk-inline-clip uk-transition-toggle uk-light" tabindex="0">
                            <img class="uk-border-circle" width="60" height="60"
                                 src="{{ asset('images') }}/{{ $user->avatar }}">
                            <div class="uk-position-center">
                                <span class="uk-transition-fade" uk-icon="icon: pencil; ratio: 2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $user->email }}</h3>
                        <p class="uk-text-meta uk-margin-remove-top">
                            Created {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <div>
                    <div class="uk-text-small uk-text-bold uk-text-uppercase">Firstname</div>
                    <div>
                        {{ $user->firstname }}
                    </div>
                </div>
                <div class="uk-margin-small-top">
                    <div class="uk-text-small uk-text-bold uk-text-uppercase">Lastname</div>
                    <div>
                        {{ $user->lastname }}
                    </div>
                </div>
                <div class="uk-margin-small-top">
                    <div class="uk-text-small uk-text-bold uk-text-uppercase">Birthday</div>
                    <div>
                        {{ $user->birthday }}
                    </div>
                </div>
            </div>
            <div class="uk-card-footer">
                <button class="uk-button uk-button-primary uk-button-small uk-align-right">
                    Edit
                </button>
            </div>
        </div>
    </div>
@endsection
