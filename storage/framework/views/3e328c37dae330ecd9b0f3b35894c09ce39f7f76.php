<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Session</th>
                            <th>Availabilty</th>
                            <th>Issue Book</th>
                            <th>Action</th>
                        </thead>

                        <tbody>

                            <?php 
                                $i=1;
                             ?>
                            <?php if($books): ?>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($book->title); ?></td>
                                        <td><?php echo e($book->author); ?></td>
                                        <td><?php echo e($book->edition); ?></td>
                                        <td><?php echo e($book->session); ?></td>
                                        <td><?php echo e($book->issues->count()? $book->quantity - $book->issues->count(): $book->quantity); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('book.issue', $book->id)); ?>" class="btn btn-xs btn-info">Issue</a>
                                        </td>
                                        <td>
                                            <form class="" action="<?php echo e(route('books.destroy', $book->id)); ?>" method="post">
                                                <?php echo e(csrf_field()); ?> <?php echo e(method_field('delete')); ?>

                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>
                                                <a class="btn btn-xs btn-success" href="<?php echo e(route('books.show', $book->id)); ?>">View</a>
                                                <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
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