@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="card mb-4 col-lg-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                       <small> <div class="alert alert-success">
                        {!! session('success') !!}
                    </div></small>
                    @endif
                    <form action="/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Product Name</small> </label>
                            <input type="text" value="{{ old('productname') }}"
                                class="form-control form-control-sm @error('productname') is-invalid @enderror"
                                name="productname" id="productname" placeholder="Enter Name">
                            @error('productname')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Category</small> </label>
                            <select class="form-control form-control-sm @error('category') is-invalid @enderror"
                                name="category" id="category" placeholder="Enter Category">
                                <option value="">------------Select any category----------</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Price</small></label>
                            <input type="number" value="{{ old('productprice') }}"
                                class="form-control form-control-sm @error('productprice') is-invalid @enderror"
                                name="productprice" id="productprice" placeholder="Enter Price">
                            @error('productprice')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Product Image</small></label>
                            <div class="custom-file">
                                <input type="file" value="{{ old('productimg') }}"
                                    class="custom-file-input @error('productimg') is-invalid @enderror" id="productimg"
                                    name="productimg">
                                <label class="custom-file-label form-control-sm" for="customFile">Choose file</label>
                                @error('productimg')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn col btn-primary btn-sm">Add Product <i
                                class="fas fa-plus-square"></i></button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
