@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header text-center">{{ trans('auth/verify.Verify_Your_Email_Address')}}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ trans('auth/verify.fresh verification link') }}
                            </div>
                        @endif

                        {{ trans('auth/verify.Before proceeding') }}
                        {{ trans('auth/verify.If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ trans('auth/verify.click here to request another') }}</button>
                            .
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
