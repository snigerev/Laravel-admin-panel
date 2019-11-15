@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3  d-flex">
            <h6 class="m-0 col-12 font-weight-bold text-primary align-self-center">{{ trans('admin/users.add_user') }}</h6>
        </div>
        <div class="card-body col-4">
            <form action="{{route('admin.users.store')}}" method="post">
                @csrf
                <div class="form-group d-flex">
                    <div class="col-6 form-row align-content-center">
                        <label for="name" class="col-form-label mb-2">{{trans('admin/users.username')}} : </label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-6 form-row align-content-center">
                        <label for="email" class="col-form-label mb-2">{{trans('admin/users.email')}} : </label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-6 form-row align-content-center">
                        <label for="password" class="col-form-label mb-2">{{trans('admin/users.password')}} : </label>
                        <input type="password" id="password" name="password"
                               class="form-control  @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-6 form-row align-content-center">
                        <label for="password-confirm"
                               class="col-form-label mb-2">{{trans('admin/users.password_confirm')}}
                            : </label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="col-auto form-row align-content-center">
                    <label for="roles">{{ trans('admin/users.group') }}</label>
                    <select class="form-control" name="role_id" id="roles">
                        <option selected disabled>{{ trans('admin/users.select_role') }}</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row col-auto d-flex">
                    <button class="btn btn-primary mt-3" type="submit">{{ trans('admin/users.add_user')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
