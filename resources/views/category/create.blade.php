@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .badge{
        color: red;
    }
</style>

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                                        <li><a href="{{ route('category') }}">Category</a></li>
                                        <li class="active">Create</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="animated fadeIn">


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add New Category</strong>
                    <a href="{{ route('category') }}" class="float-right btn btn-info btn-sm"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="card-body col-lg-12">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="category_name" class="control-label mb-1">Category Name</label>
                                    <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('category_name') }}">
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-12">
                            <div class="form-actions form-group">
                                <button type="reset" class="btn btn-warning btn-sm" style="color: white;"><i class="fa fa-rotate-left"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square" onClick='return confirmSubmit()'></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection