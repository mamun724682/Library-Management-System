<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Category</b></div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary">Add Category</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>Category</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            <?php 
                                $i=1;
                             ?>
                            <?php if($categories): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->created_at->diffForHumans()); ?></td>
                                    <td>
                                      <form class="" action="<?php echo e(route('category.destroy',  $category->id)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?> <?php echo e(method_field('delete')); ?>

                                        <a class="btn btn-primary" href="<?php echo e(route('category.edit',  $category->id)); ?>">Edit</a>
                                        <input class="btn btn-danger" type="submit" name="" value="Delete">
                                      </form>
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