<?php $__env->startSection('content'); ?>
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
                        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($stock->product_name); ?></td>
                            <td><strong><?php echo e($stock->quantity); ?></strong></td>
                            <td><?php echo e($stock->updated_at->diffForHumans()); ?></td>                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo $stocks->links(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubaid/Desktop/M-shop/resources/views/dashboard/stock/ViewStock.blade.php ENDPATH**/ ?>