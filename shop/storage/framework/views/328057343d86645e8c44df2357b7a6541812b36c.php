<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 bg-light ">
                <div class="d-block mt">
                    <img class="card-profile shadow " width="95px" style="border: 0rem; border-radius: 50px"
                        src="../../img/logo.png">
                    <br><br>
                    <a href="#" onclick="location.reload()" title="Add" class="shadow btn btn-info p-2">
                        <i class="fas fa-file-alt fa-2x"></i><br> New Invoice</a>

                    <a href="#" class="shadow btn btn-info p-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fas fa-money-bill-alt fa-2x"></i> <br>Add Expense</a>
                    <br>
                    <a href="/workers/dataentry" class="shadow btn btn-info p-2">
                        <i class="fas fa-users fa-2x"></i>
                        <br>Workers <br> Data Enrty</a>



                    
                    

                    

                    
                </div>
            </div>
            <div class="col-md-7 mt-2">
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-success">
                        <h4><strong><i class="fas fa-share-square"></i> Sale Products</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex ">
                            <div class="col-5">
                                <label for="">Items</label>
                                <input list="items" id="item" name="item" class="form-control " placeholder="Search item">
                                <datalist id="items">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->product_name); ?>" id="<?php echo e($product->id); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </datalist>
                            </div>
                            <div class="col-md-2">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Price" id="price">
                            </div>
                            <div class="col-md-2">
                                <label for="">Quantity</label>
                                <input type="text" name="qty" id="qty" onkeyup="calculateTotal(this)" class="form-control "
                                    placeholder="Enter Quantity">
                            </div>
                            <div class="col-md-2">
                                <label for="discount">Discount %</label>
                                <input type="text" value="0" onkeyup="calcDiscount(this)" name="discount" id="discount"
                                    class="form-control">
                            </div>
                            <div class="">
                                <label for="total">Total</label>
                                <input type="text" name="total" id="total" disabled class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer  p-0 m-0 ml-3 mr-3">
                        <h5>In Stock : <strong class="text-success" id="stock"></strong></h5>
                        <button class="btn btn-success btn-round mb-2" onclick="addToCart(this)" style="float: right">
                            <span class="btn-label"> <i class="material-icons">check</i> </span> Add
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        
                        <div class="card  ">
                            <div class="card-header card-header-info "><strong><i class="fas fa-history"></i> Invoice's
                                    History</strong></div>
                            <div class="card-body">

                            </div>
                            <div class="card-footer">
                                <strong> Showing 10 of n </strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    
                    <div class="col-4">
                        <div class="card  ">
                            <div class="card-header  "><strong><i class="fas fa-receipt"></i> Billing Amount</strong></div>
                            <div class="card-body justify-content-between ">
                                Discount %: <span id="discount" onkeyup="netDiscount(this)"
                                    class="form-control form-control-sm" style="float: right; width: 65px;"
                                    contenteditable="true">0.00</span>
                                <div class=""><br></div>
                                Total Amount : <span style=" float:right" id="totalAmount"> 0.00</span>
                                <br>
                                <hr>
                                Net Amount :<span style="float: right" id="netAmount"> 0.00</span>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success" onclick="checkout(this)" data-toggle="modal"
                                    data-target=".bd-invoice-modal-lg">Checkout <i
                                        class="fas fa-clipboard-check"></i></button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-md-4 mt-2">
                <div class="card card-nav-tabs bg-dark " style="height: 90vh;">
                    <h4 class="card-header card-header-warning"><strong><i class="fas fa-shopping-cart"></i> Cart</strong>
                        <small style="float: right"> Total Items: <span id="totalItems">0</span></small>
                    </h4>
                    <div class="card-body " style="overflow-y: scroll ">
                        <ul class="list-group list-group-flush" id="cart">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header ">
                    <div class="card-header card-header-rose text-center">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Add Daily Expenses</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                
                <form class="form-row" style="justify-content: stretch" action="/addexpense" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlTextarea1">Enter Expense Description</label>
                        <textarea name="desc" class="form-control p-0" id=""></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputZip">Amount</label>
                        <input type="number" name="amount" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark mb-0">Add <i
                                class="fas fa-angle-double-down"></i></button>
                    </div>
                </form>
                

                <div class="" style="overflow-y: scroll; height: 300px; ">
                    <ul class="list-group list-group-flush" style="overflow: auto">
                        <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item rounded mb-1 d-flex justify-content-between align-items-start bg-light text-dark">
                                <a href="/delete/expense/<?php echo e($expense->id); ?>"><i class="fas fa-times-circle text-warning"></i></a>
                                <div>
                                    <div style="word-break: break-word"><?php echo e($expense->desc); ?></div>
                                    <small><?php echo e($expense->created_at->diffForHumans()); ?></small>
                                </div>
                                <span class="badge bg-success rounded-pill">Rs. <?php echo e($expense->amount); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                
            </div>
            <div class="row">
                <div class="" style="margin-left: auto;margin-right: auto"><?php echo e($expenses->links()); ?></div>
            </div>

        </div>
    </div>
</div>


<!--Invoice Modal -->
<div class="modal fade bd-invoice-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body pt-2" id="printdivcontent">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <img src="img/logo.png" style="width: 80px;height: 80px; border: 0rem; border-radius: 50px"
                                alt="">
                            <div class="ml-2">
                                <h3 style="line-height: 10px; font-weight: bolder; font-family: Fira Code">
                                    <strong>SHOUKAT ALI & SONS</strong>
                                </h3>
                                <p style="line-height: 0px; margin-top: 17px; font-family: Fira Code"><strong>Mobile
                                        Phone Accessories</strong></p>
                                <h6 style="line-height: 0px">Address : lahore, Pakistan</h6>
                                <h6 style="line-height: 10px">Phone : +92 31232332</h6>
                                <hr>
                                <small>Invoice No : <span id="invoiceId"></span></small><br>
                                <small>Date : <span id="date"></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-4">
                        <h5 class="mt-2 "><b>Customer Information</b></h5>
                        <hr>
                        <strong>Customer ID : <span>u29438y432</span></strong><br>
                        <strong class="d-flex">Name : <span contenteditable="true"
                                class="pl-2">Customer name</span></strong>
                        <strong class="d-flex">Phone : <span contenteditable="true"
                                class="pl-2">03103213331</span></strong>
                    </div>
                </div>

                <div class="row">
                    <table class="table">
                        <thead class="table-light">
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>price</th>
                            <th>Disc %</th>
                            <th> Total</th>
                        </thead>
                        <tbody id="invoice-table">

                        </tbody>
                    </table>
                </div>
                <strong>Items : <span id="invoice-items"></span></strong>
                <strong style="float: right;">Net Total : <span id="invoice-total"></span></strong>
            </div>
            <div class="modal-footer">
                <button onclick="Print()" class="btn">Save & Print</button>
            </div>
        </div>
    </div>
</div>




<?php $__env->startSection('scripts'); ?>
    <script src="js/main.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubaid/Desktop/M-shop/resources/views/main.blade.php ENDPATH**/ ?>