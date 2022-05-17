@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .my-active span{
        background-color: #01C292 !important;
        color: white !important;
        border-color: #01C292 !important;
    }

</style>

@section('title')
    Product
@endsection

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
                                        <li class="active">Product</li>
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

            @if (session('status'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="card-title">Product</strong>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('product.create') }}" class="float-right btn btn-primary"><i class="fa fa-plus"></i> Add Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Code</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @if (count($product) <= 0)
                            <tr>
                                <td colspan="8" style="text-align: center">Data tidak ditemukan</td>
                            </tr>
                        @else
                        
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($product as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>Rp. {{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <span class="btn btn-primary btn-sm">{{ $item->category->category_name }}</span>
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$item->image) }}" alt="" width="80" height="80">
                                    </td>
                                    <td>Otto</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card">
                {{-- {{ $stnk->links('vendor.pagination.customPagination') }} --}}
            </div>
        </div>
    </div>
</div>
    
@endsection