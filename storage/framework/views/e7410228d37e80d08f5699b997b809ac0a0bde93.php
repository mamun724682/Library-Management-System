<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Users 
                    <span class="badge bg-info"><?php echo e($users->count()); ?></span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary"><span class="fa fa-user"></span>Add User</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered as</th>
                            <th>Status</th>
                            <th>Rule</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php if($users): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><img width="40px" style="border-radius: 50%;" src="<?php echo e(asset('uploads/avatar/'. $user->avatar)); ?>" /></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->reg_as? 'Teacher' : 'Student'); ?></td>
                                        <td>
                                            <?php if( $user->is_approved): ?>
                                                <p class="text-success">Verified</p>
                                                <?php else: ?>
                                                    <p class="text-primary">Pending</p>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if( $user->is_admin): ?>
                                                <p class="text-success">Admin</p>
                                                <?php else: ?>
                                                    <p class="text-primary">General</p>
                                            <?php endif; ?>

                                        </td>

                                        <td>
                                            <?php if($user->is_approved): ?>
                                                <a href="<?php echo e(route('user.unverify', $user->id)); ?>" class="btn btn-xs btn-danger">Unverify</a>

                                                <?php else: ?>
                                                    <a href="<?php echo e(route('user.verify', $user->id)); ?>" class="btn btn-xs btn-info">Verify</a>
                                            <?php endif; ?>
                                            <?php if($user->is_admin): ?>
                                                <a href="<?php echo e(route('user.general', $user->id)); ?>" class="btn btn-xs btn-danger">General</a>

                                                <?php else: ?>
                                                    <a href="<?php echo e(route('user.admin', $user->id)); ?>" class="btn btn-xs btn-info">Admin</a>
                                            <?php endif; ?>

                                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-xs btn-dark">Edit</a>

                                            <?php if($user->id != Auth::user()->id): ?>
                                                <a href="<?php echo e(route('user.destroy', $user->id)); ?>" class="btn btn-xs btn-danger">Delete</a>
                                            <?php endif; ?>

                                            <a href="<?php echo e(route('users.show', $user->id)); ?>" class="btn btn-xs btn-danger">Profile</a>

                                         </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>