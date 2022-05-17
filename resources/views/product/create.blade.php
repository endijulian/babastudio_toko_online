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
                                        <li><a href="{{ route('product') }}">Product</a></li>
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
                    <strong class="card-title">Add Product</strong>
                    <a href="{{ route('product') }}" class="float-right btn btn-info btn-sm"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body col-lg-6">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="name" class="control-label mb-1">Name<span class="badge">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('name') }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>

                                <div class="form-group accordion">
                                    <label for="code" class="control-label mb-1">Code<span class="badge">*</span></label>
                                    <input id="code" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('code') }}">
                                    <p class="text-danger">{{ $errors->first('code') }}</p>
                                </div>

                                <div class="form-group accordion">
                                    <label for="category_id" class="control-label mb-1">Category<span class="badge">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            @foreach ($category as $value)
                                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-body col-lg-6">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="price" class="control-label mb-1">Price<span class="badge">*</span></label>
                                    <input id="price" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('price') }}">
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group accordion">
                                    <label for="quantity" class="control-label mb-1">Quantity<span class="badge">*</span></label>
                                    <input id="quantity" name="quantity" type="number" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('quantity') }}">
                                    <p class="text-danger">{{ $errors->first('quantity') }}</p>
                                </div>
                                <div class="form-group accordion">
                                    <label for="image" class="control-label mb-1">Image<span class="badge">*</span></label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('image') }}">
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
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