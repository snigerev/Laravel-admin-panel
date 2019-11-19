@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3  d-flex">
            <h6 class="m-0 col-12 font-weight-bold text-primary align-self-center">{{ trans('admin/users.delete_user') }}</h6>
        </div>
        <div class="card-body col-8">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin/users.username') }}</th>
                        <th>{{ trans('admin/users.nickname') }}</th>
                        <th>{{ trans('admin/users.email') }}</th>
                        <th>{{ trans('admin/users.group') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->DataUser->nickname }}</td>
                        <td>{{ $user->email }}</td>

                        <td>{{ trans('admin/users.' . $user->DataUser->role_id) }}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">{{ trans('admin/users.back') }}</a>
            <form action="{{route('admin.users.destroy', $user->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">{{ trans('admin/users.delete') }}</button>
            </form>
        </div>
    </div>
@endsection
