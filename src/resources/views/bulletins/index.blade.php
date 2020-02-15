@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-sm-8">
        @if(count($bulletins))
        @foreach($bulletins as $bulletin)
        <div class="p-3 card d-flex mb-2 flex-md-row">
            <div class="mb-2 d-flex justify-content-center mr-md-2">
                <img width="200px" height="200px" src="{{ $bulletin->image ? $bulletin->image : config('app.path_default_image')}}" alt="Image" style="object-fit: contain;">
            </div>
            <div style="width: 100%;">
                <div>
                    <h5 class="mb-0"><a href="{{ route('bulletins.show', $bulletin->id) }}">{{ $bulletin->title }}</a></h5>
                </div>
                <div class="text-right">
                    <small>{{ $bulletin->created_at->isoFormat('YYYY-MM-DD') }}</small>
                </div>
                <div class="mt-2">{{ strlen($bulletin->description) <= 255 ?  $bulletin->description : trim(mb_substr($bulletin->description, 0, 255)) . "..." }}</div>
            </div>
        </div>
        @endforeach
        {{$bulletins->links()}}
        @else
        <div class="mt-3 text-center">
            <h4>Not Bulletins</h4>
        </div>
        @endif
    </div>
</div>
@endsection