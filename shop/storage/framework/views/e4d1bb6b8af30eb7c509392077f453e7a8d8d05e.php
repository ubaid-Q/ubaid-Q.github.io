<style>
    .hidden {
        display: none;
    }

</style>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#searchpanel").slideToggle("slow");
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

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
                    <?php echo csrf_field(); ?>
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
                <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-1 shadow rounded">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold mb-1"><b><?php echo e($stock->product_name); ?></b></div>
                            <small><?php echo e(Carbon\Carbon::parse($stock->created_at)->format('D d-m-Y')); ?></small>
                        </div>
                        <div class="ms-2 me-auto">
                            <span class="badge-success badge  rounded-pill mb-2">Rs : <?php echo e($stock->net_amount); ?></span><br>
                            <span><small><strong>Quantity : <?php echo e($stock->quantity); ?></strong></small></span>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </div>
  
    <?php if($stocks instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
        <div class="card-footer fixed-bottom pl-5  shadow">
            <?php echo e($stocks->Links()); ?>

        </div>
    <?php endif; ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubaid/Desktop/M-shop/resources/views/dashboard/history.blade.php ENDPATH**/ ?>