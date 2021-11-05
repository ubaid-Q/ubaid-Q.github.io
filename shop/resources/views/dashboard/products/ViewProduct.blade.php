@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="card mb-4 col-lg-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Product - {{ $product->product_name }}</h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Product Name</small> </label>
                            <input type="text" value="{{ $product->product_name }}"
                                class="form-control form-control-sm @error('productname') is-invalid @enderror"
                                name="productname" id="productname" placeholder="Enter Name">
                            @error('productname')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Category</small> </label>
                            <select class="form-control form-control-sm @error('category') is-invalid @enderror"
                                name="category" id="category">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category == $category->category_name) selected  @endif>{{$category->category_name}}</option>
                            @endforeach
                            </select>
                            @error('category')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Price</small></label>
                            <input type="number" value="{{ $product->price }}"
                                class="form-control form-control-sm @error('productprice') is-invalid @enderror"
                                name="productprice" id="productprice" placeholder="Enter Price">
                            @error('productprice')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Product Image</small></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="productimg" name="productimg">
                                <label class="custom-file-label form-control-sm" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button style="float: right" type="submit" class="btn  btn-success btn-sm"> Update <i
                                class="fas fa-edit"></i></button>
                    </form>
                    <form onsubmit="return confirm('Want to delete {{$product->product_name}} \nAre you sure? ')" action="/products/{{ $product->id }}" class="form" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-outline-danger btn-sm shadow"> DELETE <i
                                class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
