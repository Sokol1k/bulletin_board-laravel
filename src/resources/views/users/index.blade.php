@extends('layouts.app')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button id="btnConfirmed" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <div class="col-sm-8">
        <div class="text-left mb-2">
            <a role="button" href="{{ route('bulletins.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light ">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Confirmed</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        <td>
                            @if($user->confirmed == 1)
                            <div class="text-success">confirmed</div>
                            @elseif($user->confirmed == 2)
                            <div class="text-danger">rejected</div>
                            @else
                            <div class="text-primary">pending</div>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(Auth::user()->id != $user->id)
                            <div style="width: 63px;">
                                <button type="button" data-toggle="modal" data-target="#exampleModal" data-url="{{ route('users.confirm', [$user->id, 1]) }}" data-name="{{$user->name}}" data-type='1' @if ($user->confirmed == 1) class='btn btn-secondary btn-sm fa fa-check' disabled style="cursor: default;" @else class='btn btn-success btn-sm fa fa-check' data-toggle="tooltip" data-placement="bottom" title="Сonfirm" @endif></button>
                                <button type="button" data-toggle="modal" data-target="#exampleModal" data-url="{{ route('users.confirm', [$user->id, 2]) }}" data-name="{{$user->name}}" data-type='2' @if ($user->confirmed == 2) class='btn btn-secondary btn-sm fa fa-close' disabled style="cursor: default;" @else class='btn btn-danger btn-sm fa fa-close' data-toggle="tooltip" data-placement="bottom" title="Reject" @endif></button>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->links()}}
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::asset('js/usersList.js') }}"></script>
@endpush