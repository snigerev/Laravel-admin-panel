@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3  d-flex">
            <h6 class="m-0 col-12 font-weight-bold text-primary align-self-center">{{ trans('admin/users.edit_user') }}</h6>
        </div>
        <div class="card-body col-4">
            <form action="{{route('admin.users.update', $user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="col-auto form-row align-content-center">
                    <label for="name" class="col-form-label mb-2">{{trans('admin/users.username')}} : </label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="{{$user->name}}">
                </div>
                <div class="col-auto form-row align-content-center">
                    <label for="nickname" class="col-form-label mb-2">{{trans('admin/users.nickname')}} : </label>
                    <input type="text" id="nickname" name="nickname" class="form-control"
                           placeholder="{{$user->DataUser->nickname}}">
                </div>
                <div class="col-auto form-row align-content-center">
                    <label for="email" class="col-form-label mb-2">{{trans('admin/users.email')}} : </label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="{{$user->email}}">
                </div>
                <div class="col-auto form-row align-content-center">
                    <label for="roles">{{ trans('admin/users.group') }}</label>
                    <select class="form-control" name="role_id" id="roles">
                        <option selected disabled>{{ trans('admin/users.select_role') }}</option>
                        @for ($i = 0; $i < 3; $i++)
                            <option
                                @if ($i === $user->DataUser->role_id)
                                selected
                                @endif
                                value="{{$i}}">{{ trans('admin/users.'. $i) }}</option>
                        @endfor

                    </select>
                </div>
                <div class="form-row col-auto d-flex">
                    <button class="btn btn-primary mt-3" type="submit">{{ trans('admin/users.save_user')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
