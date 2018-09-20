<?php $__env->startSection('content'); ?>
<style media="screen">
.blink_me {
    color: red;
    font-weight: bold;
    animation: blinker 2s linear infinite;
}

@keyframes  blinker {
    50% {
        opacity: 0;
    }
}
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Welcome <?php echo e(Auth::user()->name); ?></h1>
                    <?php if(Auth::user()->is_admin): ?>
                        <div class="col-md-3">
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo e(route('users.index')); ?>'">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo e($user_count); ?></div>
                                    <div class="widget-title">Registered users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>

                    <?php else: ?>
                        <?php if($issueBooks): ?>

                            <div class="col-md-6" style="border: 2px solid gray">
                                <!-- START WIDGET REGISTRED -->
                                <div class="widget widget-default">
                                    <div class="widget-item-left">
                                        <span class="fa fa-book"></span>
                                    </div>
                                    <div class="widget-data">
                                        <div class="col-sm-12">
                                            <h4 class="text-success">Pending Books</h4>
                                            <ul class="list-group ">
                                                <?php if(count($issueBooks)): ?>
                                                    <?php $__currentLoopData = $issueBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="list-group-item">
                                                             <?php echo e($book->book->title); ?> book | <span <?php if(date('Y-m-d') == $book->return_date || date('Y-m-d') > $book->return_date): ?>
                                                                class="blink_me "
                                                            <?php endif; ?>>Dateline : <?php echo e($book->return_date); ?></span>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <h4>No Book issued :)</h4>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- END WIDGET REGISTRED -->

                            </div>






                        <?php endif; ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>