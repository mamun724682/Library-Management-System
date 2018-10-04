<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        All Books 
                    <span class="badge bg-info"><?php echo e($books->count()); ?></span>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Session</th>
                            <th>Category</th>
                            <th>Shelf</th>
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
                                        <td><a href="<?php echo e(route('category.books', $book->id)); ?>"><?php echo e($book->category->name); ?></a></td>
                                        <td><a href="<?php echo e(route('shelf.books', $book->id)); ?>"><?php echo e($book->shelf->name); ?></a></td>
                                        <td><?php echo e($book->issues->count() ? $book->quantity - $book->issues->count(): $book->quantity); ?></td>
                                        <td>
                                            <?php if($book->quantity - $book->issues->count()): ?>
                                                <a href="<?php echo e(route('book.issue', $book->id)); ?>" class="btn btn-xs btn-info">Issue</a>
                                            <?php else: ?>
                                                <button class="btn btn-xs btn-danger" disabled>Unavailable</button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>

                                            <a class="btn btn-xs btn-success" href="<?php echo e(route('books.show', $book->id)); ?>">Details</a>

                                            <button class="btn btn-xs btn-danger" type="button" onclick="deleteBook(<?php echo e($book->id); ?>)">
                                                Delete
                                            </button>
                                            <form id="delete-form-<?php echo e($book->id); ?>" action="<?php echo e(route('books.destroy', $book->id)); ?>" method="post" style="display: none;">
                                                <?php echo e(csrf_field()); ?> <?php echo e(method_field('delete')); ?>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript">
    function deleteBook(id) {
        const swalWithBootstrapButtons = swal.mixin({
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
      })

        swalWithBootstrapButtons({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.cancel
    ) {
            swalWithBootstrapButtons(
              'Cancelled',
              'Your data is safe :)',
              'error'
              )
        }
    })
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>