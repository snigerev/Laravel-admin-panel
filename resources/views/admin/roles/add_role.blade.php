@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3  d-flex">
            <h6 class="m-0 col-12 font-weight-bold text-primary align-self-center">{{ trans('admin/roles.title_add_role') }}</h6>
        </div>
        <div class="card-body col-4">
            <form action="{{route('admin.roles.store')}}" method="post">
                @csrf
                <div class="col-auto form-row align-content-center">
                    <label for="role_name" class="col-form-label mb-2">{{trans('admin/roles.role_name')}} : </label>
                    <input type="text" id="role_name" name="role_name" class="form-control">
                </div>
                <div class="form-row col-auto d-flex">
                    <button class="btn btn-primary mt-3" type="submit">{{ trans('admin/roles.add_role')}}</button>
                    <a href="{{route('admin.roles.index')}}" class="btn btn-dark mt-3 ml-auto">
                        {{ trans('admin/roles.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/admin/users.js')}}"></script>
@endsection
