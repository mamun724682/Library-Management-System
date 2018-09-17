<?php $__env->startSection('content'); ?>
<style media="screen">
.ronly{
    background-color: white !important;
    color: black !important;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><strong>Issue Book </strong></h2></div>

                <div class="panel-body">

                    

                    <form class="form-horizontal" method="post" action="<?php echo e(route('issue.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('book_id') ? ' has-error' : ''); ?>">
                            <label for="book_id" class="col-md-4 control-label">Book Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control ronly" name="book_name" value="<?php echo e($book->title); ?>" readonly>
                                <input type="text" name="book_id" value="<?php echo e($book->id); ?>" hidden>

                                <?php if($errors->has('book_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('book_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Enter Your Email</label>
                            <div class="col-md-6">
                                <input type="text" name="email" id="email" class="form-control" />
                                <span style="color:blue;"><b><small  id="show"</small></b> </span>
                            </div>

                            <span id="error_email"></span>
                        </div>
                        <div class="form-group<?php echo e($errors->has('issue_date') ? ' has-error' : ''); ?>">
                            <label for="issue_date" class="col-md-4 control-label">Issue Date</label>

                            <div class="col-md-6">
                                <input id="issue_date" type="date" class="form-control" name="issue_date" value="<?php echo e(old('issue_date')); ?>" >

                                <?php if($errors->has('issue_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('issue_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('return_date') ? ' has-error' : ''); ?>">
                            <label for="return_date" class="col-md-4 control-label">Return Book</label>

                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control" name="return_date" value="<?php echo e(old('return_date')); ?>" >

                                <?php if($errors->has('return_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('return_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <input type="text" name="user_id" id="user_id" value="" hidden>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
<?php $__env->startSection('js'); ?>

    <script>
    $('#email').keyup(function(){
        var email = $(this).val();
        $.ajax({
            url:"<?php echo e(route('email_available.check')); ?>",
            method:"get",
            data:{email:email},
            success:function(result)
            {
                $('#show').html(result.name)
                $('#user_id').val(result.id)
            },
            error:function(result)
            {
                $('#show').html('No User found')
            }

        });
    });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>