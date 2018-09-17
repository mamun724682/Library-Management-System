<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('users.update', $user->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="avatar" >

                            <?php if($errors->has('avatar')): ?>
                                <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('avatar')); ?></strong>
                                </span>
                            <?php else: ?>
                                <p>Old Image</p>
                                <img width="100px" class="img-rounded" src="<?php echo e(asset('uploads/avatar/'. $user->avatar)); ?>" />
                                <span class="help-block">
                                    Only image supported
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Identity</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="identity" >

                            <?php if($errors->has('identity')): ?>

                                <span class="help-block">
                                    <strong style="color:#a94442"><?php echo e($errors->first('identity')); ?></strong>
                                </span>
                            <?php else: ?>
                                <p>Old Image</p>
                                <img width="100px" class="img-rounded" src="<?php echo e(asset('uploads/identity/'. $user->identity)); ?>" />
                                <span class="help-block">
                                    Only image supported
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Registered As</label>

                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="reg_as" <?php if($user->reg_as == 1): ?>
                                        checked
                                    <?php endif; ?>>Teacher
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="reg_as"  <?php if($user->reg_as == 0): ?>
                                        checked
                                    <?php endif; ?>>Student
                                </label>
                            </div>

                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>