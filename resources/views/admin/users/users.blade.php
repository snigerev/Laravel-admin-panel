@extends('admin.template')

@section('header')
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection

@section('content')
        <users-list></users-list>
@endsection
