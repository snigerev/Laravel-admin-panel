@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="UsersTable" class="card shadow mb-4">
        <users-list></users-list>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/admin/users.js')}}"></script>
@endsection
