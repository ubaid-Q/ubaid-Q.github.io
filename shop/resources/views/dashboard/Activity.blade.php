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
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 style="font-size: 5vw;"><strong><i class="fas fa-clipboard-list fa-md"></i> Activity Log </strong></h5>
            <i class=" fas fa-search" style="float: right" id="flip"></i>
        </div>

        <div style="display: none" id="searchpanel">
            <label for=""><small>Search by Month</small></label>
            <div class="">
          <form class=" d-flex " action="/viewActivity" method="post">
                @csrf
                <input class="form-control form-control-sm col-lg-3  mr-2"  type="month" name="month" id="month">
                <button type="submit" class="btn btn-sm btn-success pl-3 pr-3" style="float: right"><i
                        class="fas fa-search"></i></button>
                </form>
            </div>
        </div>


        <div class="mt-2">
            <div class="card">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>
            </div>
        </div>





    @endsection
