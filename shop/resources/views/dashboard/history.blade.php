@extends('layouts.dashboard')
<style>
    .hidden {
        display: none;
    }

</style>
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#searchpanel").slideToggle("slow");
            });
        });
    </script>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 style="font-size: 5vw;"><strong><i class="fas fa-history fa-md"></i> View History </strong></h5>
                <i class=" fas fa-search" style="float: right" id="flip"></i>
            </div>

            <div style="display: none" id="searchpanel">
                <label for=""><small>Search by date</small></label>
                <div class="">
                    <form class=" d-flex " action=" /viewhistory" method="post">
                    @csrf
                    <input class="form-control form-control-sm col-lg-3  mr-2" style="" type="date" name="date" id="date">
                    <button type="submit" class="btn btn-sm btn-success pl-3 pr-3" style="float: right"><i
                            class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-1"></div>


  
        <div class="card-body mb-5">
            <ol class="list-group list-group-numbered">
                @foreach ($stocks as $stock)
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-1 shadow rounded">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold mb-1"><b>{{ $stock->product_name }}</b></div>
                            <small>{{ Carbon\Carbon::parse($stock->created_at)->format('D d-m-Y') }}</small>
                        </div>
                        <div class="ms-2 me-auto">
                            <span class="badge-success badge  rounded-pill mb-2">Rs : {{ $stock->net_amount }}</span><br>
                            <span><small><strong>Quantity : {{ $stock->quantity }}</strong></small></span>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
  
    @if ($stocks instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="card-footer fixed-bottom pl-5  shadow">
            {{ $stocks->Links() }}
        </div>
    @endif




@endsection
