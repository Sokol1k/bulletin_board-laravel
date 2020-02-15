@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-sm-8">
        <div class="text-left mb-2">
            <a role="button" href="{{ (url()->previous() != route('bulletins.create') && url()->previous() != route('bulletins.edit', $bulletin->id)) ? url()->previous() : route('bulletins.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="p-3 card">
            <div class="d-flex flex-column flex-md-row mb-2">
                <div class="mb-2 d-flex justify-content-center mr-md-2">
                    <img width="200px" height="200px" src="{{ $bulletin->image ? $bulletin->image : config('app.path_default_image')}}" alt="Image" style="object-fit: contain;">
                </div>
                <div style="width: 100%;">
                    <div>
                        <h5 class="mb-0">{{ $bulletin->title }}</h5>
                    </div>
                    <div class="text-right">
                        <small>{{ $bulletin->created_at->isoFormat('YYYY-MM-DD') }}</small>
                    </div>
                    <div class="mt-2">{{ $bulletin->description }}</div>
                    <div class="mt-2">
                        <div>Tel: {{ $bulletin->phone }}</div>
                        <div>Country: {{ $bulletin->country }}</div>
                        <div>Mail: <a href="mailto:{{ $bulletin->email }}">{{ $bulletin->email }}</a></div>
                    </div>
                </div>
            </div>
            @if ($bulletin->latitude && $bulletin->longitude)
                <div id="showMap" class="map" data-lat="{{$bulletin->latitude}}" data-lng='{{ $bulletin->longitude}}'></div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('map.GOOGLE_API_KEY') }}&language=en&callback=showMap"></script>
@endpush

 <!--   -->