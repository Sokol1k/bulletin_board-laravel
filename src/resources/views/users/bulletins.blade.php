@extends('layouts.app')

@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button id="btnDelete" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <div class="col-sm-8 col-md-12">
        <div class="text-left mb-2">
            <a role="button" href="{{ route('bulletins.index') }}" class="btn btn-primary">Back</a>
        </div>
        @if(count($bulletins))
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light ">
                    <th>Title</th>
                    @if(Auth::user()->hasRole('admin'))
                    <th>User name</th>
                    <th>User email</th>
                    @endif
                    <th style="width: 87px;">Is expired</th>
                    <th style="width: 106px;">Create Date</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @foreach($bulletins as $bulletin)
                    <tr>
                        @if(Auth::user()->hasRole('admin'))
                        <td><a href="{{ url('bulletins/' . $bulletin->id) }}" data-toggle="tooltip" data-placement="bottom" title="{{ $bulletin->title }}">{{ strlen($bulletin->title) <= 80?  $bulletin->title : trim(mb_substr($bulletin->title, 0, 80)) . "..." }}</a></td>
                        <td style='width: 94px;' class="text-center">{{ $bulletin->name }}</td>
                        <td><a href="mailto:{{ $bulletin->email }}" data-toggle="tooltip" data-placement="bottom" title="{{ $bulletin->email }}">{{ strlen($bulletin->email) <= 20 ?  $bulletin->email : trim(mb_substr($bulletin->email, 0, 20)) . "..." }}</a></td>
                        @else
                        <td><a href="{{ url('bulletins/' . $bulletin->id) }}">{{ $bulletin->title }}</a></td>
                        @endif
                        <td style="width: 86px;" class="text-center">
                            @if($bulletin->end_date->greaterThan(now()))
                            <span class="badge badge-pill badge-success">No</span>
                            @else
                            <span class="badge badge-pill badge-danger">Yes</span>
                            @endif
                        </td>
                        <td>
                            {{ $bulletin->created_at->isoFormat('YYYY-MM-DD') }}
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-between" style="width: 61px; margin: 0 auto;">
                                <div><a role="button" href="{{ route('bulletins.edit', $bulletin->id) }}" class="btn btn-primary btn-sm fa fa-pencil" data-toggle="tooltip" data-placement="bottom" title="Edit"></a></div>
                                <button type="button" data-toggle="modal" data-target="#deleteModal" data-name="{{ $bulletin->title }}" data-url="{{ route('bulletins.destroy', $bulletin->id)}}" class='btn btn-danger btn-sm fa fa-close' data-toggle="tooltip" data-placement="bottom" title="Delete"></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$bulletins->links()}}
        @else
        <div class="mt-3 text-center">
            <h4>Not Bulletins</h4>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('js/usersBulletins.js') }}"></script>
@endpush