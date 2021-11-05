@extends('layouts.dashboard')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">View All Workers</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Shift Start</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>fsafs</td>
                        <td><input class="form-control form-control-sm" type="time" name="shift" id="shift"></td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>fsafs</td>
                        <td><input class="form-control form-control-sm" type="time" name="shift" id="shift"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection