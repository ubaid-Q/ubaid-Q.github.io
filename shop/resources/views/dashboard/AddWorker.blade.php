@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="card mb-4 col-lg-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Worker</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small> Name</small> </label>
                            <input type="text" class="form-control form-control-sm" name="browser" id="browser"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Phone</small></label>
                            <input type="number" class="form-control form-control-sm" id="price" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Address</small></label>
                            <input type="text" class="form-control form-control-sm" id="price" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Pay</small></label>
                            <input type="number " class="form-control form-control-sm" id="pay" placeholder="Enter Pay">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><small>Shift Timing</small></label>
                           <div class="d-flex">
                            <input type="time" class="form-control form-control-sm" id="shiftstart" name="shiftstart" >
                            <div class="pl-2 pr-2 pt-1">To </div>
                            <input type="time" class="form-control form-control-sm" id="shiftend" name="shiftend" >
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
