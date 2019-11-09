@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 col-10 font-weight-bold text-primary">{{ trans('admin/users.user_table') }}</h6>
            <a href="{{route('admin.users.create')}}"
               class="btn col-2 m-auto btn-primary">{{ trans('admin/users.add_user') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin/users.username') }}</th>
                        <th>{{ trans('admin/users.email') }}</th>
                        <th>{{ trans('admin/users.group') }}</th>
                        <th>{{ trans('admin/users.actions') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin/users.username') }}</th>
                        <th>{{ trans('admin/users.email') }}</th>
                        <th>{{ trans('admin/users.group') }}</th>
                        <th>{{ trans('admin/users.actions') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>@if (isset($user->role->role_name))
                                    {{ trans('admin/users.' . $user->role->role_name) }}
                                @else
                                    {{ trans('admin/users.no_group') }}
                                @endif</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{--    <script type="text/javascript"> $(document).ready(function(){ alert(jQuery.fn.jquery); }); </script>--}}
    <script src="{{asset('js/admin/users.js')}}"></script>
@endsection
