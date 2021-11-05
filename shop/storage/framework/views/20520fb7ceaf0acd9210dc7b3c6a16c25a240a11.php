<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="card mb-4 col-lg-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Stock</h6>
                </div>
                <?php if(session('success')): ?>
                    <small class="pl-3 text-success"><Strong><?php echo e(session('success')); ?></Strong></small>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/stock" method="POST" id="stockform">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><small>Product Name</small> </label>
                            <input list="products" class="form-control form-control-sm" required name="product_name" id="product_name"
                                placeholder="Select Product">
                                <input type="hidden" name="product_id" id="product_id" >
                            <datalist id="products">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->product_name); ?>" id="<?php echo e($product->id); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubaid/Desktop/M-shop/resources/views/dashboard/stock/AddStock.blade.php ENDPATH**/ ?>