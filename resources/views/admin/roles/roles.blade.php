@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3  d-flex">
            <h6 class="m-0 col-10 font-weight-bold text-primary align-self-center">{{ trans('admin/roles.roles_table') }}</h6>
            <a href="{{route('admin.roles.create')}}"
               class="btn col-2 m-auto btn-primary">{{ trans('admin/roles.add_role') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{trans('admin/roles.role_name')}}</th>
                        <th>{{trans('admin/roles.actions')}}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{trans('admin/roles.role_name')}}</th>
                        <th>{{trans('admin/roles.actions')}}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->role_name}}</td>
                            <td>
                                <a href="{{route('admin.roles.edit', $role->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('admin.roles.delete', $role->id)}}">
                                    <i class="fas fa-trash-alt"></i>
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
