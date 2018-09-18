<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Show Profile</div>

                <div class="panel-body">

                    <table class="table no-borderd">
                        <tr>
                            <td colspan="3">
                                <img src="<?php echo e(asset('uploads/avatar/'.$user->avatar)); ?>" width="400px" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td width="10px">Name</td>
                            <td width="1%">:</td>
                            <td><?php echo e($user->name); ?></td>
                        </tr>
                        <tr>
                            <td width="10px">Email</td>
                            <td width="1%">:</td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <td width="10px">Identity</td>
                            <td width="1%">:</td>
                            <td><img src="<?php echo e(asset('uploads/identity/'.$user->identity)); ?>" width="70%" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>