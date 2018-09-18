<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Issue Books</div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Book Title</th>
                            <th>User</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>

                        <tbody>

                            <?php 
                                $i=1;
                             ?>
                            <?php if($issue_books): ?>
                                <?php $__currentLoopData = $issue_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($book->book->title); ?></td>
                                        <td><?php echo e($book->user->name); ?></td>
                                        <td><?php echo e($book->issue_date); ?></td>
                                        <td><?php echo e($book->return_date); ?></td>
                                        <td><?php echo e($book->status? 'Returned' : 'Pending'); ?></td>
                                        <td>
                                            <?php if(!$book->status): ?>
                                                <a href="<?php echo e(route('book.return',$book->id)); ?>" class="btn btn-xs btn-primary">Returned</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('book.pending',$book->id)); ?>" class="btn btn-xs btn-danger">Pending</a>
                                            <?php endif; ?>

                                            
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