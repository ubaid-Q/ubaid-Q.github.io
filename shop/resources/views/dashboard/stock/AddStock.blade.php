@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="card mb-4 col-lg-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Stock</h6>
                </div>
                @if (session('success'))
                    <small class="pl-3 text-success"><Strong>{{ session('success') }}</Strong></small>
                @endif
                <div class="card-body">
                    <form action="/stock" method="POST" id="stockform">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Product Name</small> </label>
                            <input list="products" class="form-control form-control-sm" required name="product_name" id="product_name"
                                placeholder="Select Product">
                                <input type="hidden" name="product_id" id="product_id" >
                            <datalist id="products">
                                @foreach ($products as $product)
                                    <option value="{{ $product->product_name }}" id="{{ $product->id }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Rate (-/)</small></label>
                            <input type="number" class="form-control form-control-sm" required id="price" name="price"
                                placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Quantity</small></label>
                            <input type="number" class="form-control form-control-sm" required id="quantity" name="quantity"
                                placeholder="Enter Quantity">
                        </div>
                        <button type="submit" class="btn col btn-primary btn-sm">Add <i
                                class="fas fa-plus-square"></i></button>
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('#product_name').on('input', function() {
                var opt = $('option[value="' + $(this).val() + '"]');
                prod_id = opt.attr('id');
                let a = document.getElementById('product_id').value = prod_id;
                console.log(a);
            });
        });
    </script>
@endsection
