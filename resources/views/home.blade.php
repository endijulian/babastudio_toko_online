@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .admin-logo{
        display: block;
        margin-top: 200px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>

@section('title')
    Home
@endsection

@section('content')
    <img src="{{ asset('Template-Admin/images/logo.png') }}" alt="" class="admin-logo">
@endsection
