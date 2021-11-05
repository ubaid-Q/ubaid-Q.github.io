<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="/css/material-dashboard.min.css?v=2.2.2" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.0/socket.io.min.js" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            margin: 0;
        }

        .img {
            border: 2px solid #fff;
            -moz-box-shadow: 0px 6px 5px #ccc;
            -webkit-box-shadow: 0px 6px 5px #ccc;
            box-shadow: 0px 6px 5px #ccc;
            -moz-border-radius: 190px;
            -webkit-border-radius: 190px;
            border-radius: 190px;
        }

        body::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>

<body>
    <main>

        <?php echo $__env->yieldContent('content'); ?>

    </main>


    <!--   Core JS Files   -->
    <script src="js/core/jquery.min.js" type="text/javascript"></script>
    <script src="js/core/popper.min.js" type="text/javascript"></script>
    <script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/ubaid/Desktop/M-shop/resources/views/layouts/app.blade.php ENDPATH**/ ?>