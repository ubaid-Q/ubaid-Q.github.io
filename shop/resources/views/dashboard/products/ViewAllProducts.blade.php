@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {!! session('success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">View All Products</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr class='clickable-row' style="cursor: pointer" data-href='{{ asset('/products/'. $product->id) }}'>
                                <td>{{ $product->id }}</td>
                                <td><img style="width: 30px; height: 30px;" class="rounded" src="{{asset('/images/'.$product->product_img)}}" alt=""></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{  $product->category->category_name   }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection
