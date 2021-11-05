@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">View All Stock</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table  table-secondary align-items-center table-flush table-hover" id="">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Last Updated </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                        <tr>
                            <td>{{$stock->product_name}}</td>
                            <td><strong>{{$stock->quantity}}</strong></td>
                            <td>{{$stock->updated_at->diffForHumans()}}</td>                            
                        </tr>
                        @endforeach                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $stocks->links() !!}
    </div>

@endsection
