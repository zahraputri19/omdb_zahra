@extends('controlpanel.components.main')

@section('content')
<div class="section-header">
    <h1>{{ __('messages.my_favorites') }}</h1>
</div>

<div class="section-body">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('messages.favorite_movies') }}</h4>
                </div>
                <div class="card-body">
                    <div id="favorites-content">
                        <div class="text-center py-5">
                            <i class="fas fa-heart-broken fa-3x text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">{{ __('messages.no_favorites') }}</h5>
                            <p class="text-muted">{{ __('messages.start_adding') }}</p>
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-search"></i> {{ __('messages.find_movie') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection