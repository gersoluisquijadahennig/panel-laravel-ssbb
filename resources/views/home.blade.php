@extends('layouts.app')

@section('title', 'New Laravel Project')

@section('content_header')
    <h1>Dashboard desde modulo</h1>
@stop

@section('content')

                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="col-lg-3 col-6">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{'Users';}}</font></font></font></span>
                    <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{41.410}}</font></font></span>
                    <div class="progress">
                    <div class="progress-bar" style="width: {{ 70 }}"></div>
                    </div>
                    <span class="progress-description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Aumento del 70% en 30 días
                    </font></font></span>
                    </div>
                    
                    </div>
                </div>
                {{--</div>--}}
@endsection
