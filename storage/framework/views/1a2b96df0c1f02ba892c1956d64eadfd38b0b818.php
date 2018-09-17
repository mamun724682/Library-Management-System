<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>View Book </strong></h2></div>

                    <div class="panel-body">

                        <div class="col-md-8">
                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title" class="col-md-4 control-label">Book Title</label>

                                <div class="col-md-6">
                                    <?php echo e($book->title); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('author') ? ' has-error' : ''); ?>">
                                <label for="author" class="col-md-4 control-label">Book Author</label>

                                <div class="col-md-6">
                                    <?php echo e($book->author); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('edition') ? ' has-error' : ''); ?>">
                                <label for="edition" class="col-md-4 control-label">Book Edition</label>

                                <div class="col-md-6">
                                    <?php echo e($book->edition); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('session') ? ' has-error' : ''); ?>">
                                <label for="session" class="col-md-4 control-label">Book Session</label>

                                <div class="col-md-6">
                                    <?php echo e($book->session); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="categories" class="col-md-4 control-label">Book Category</label>
                                <div class="col-md-6">
                                    <?php echo e($book->category->name); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('page') ? ' has-error' : ''); ?>">
                                <label for="page" class="col-md-4 control-label">Book Page</label>

                                <div class="col-md-6">
                                    <?php echo e($book->page); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('publisher') ? ' has-error' : ''); ?>">
                                <label for="publisher" class="col-md-4 control-label">Book Publisher</label>

                                <div class="col-md-6">
                                    <?php echo e($book->publisher); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
                                <label for="language" class="col-md-4 control-label">Book Language</label>

                                <div class="col-md-6">
                                    <?php echo e($book->language); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('isbn') ? ' has-error' : ''); ?>">
                                <label for="isbn" class="col-md-4 control-label">Book ISBN</label>

                                <div class="col-md-6">
                                    <?php echo e($book->isbn); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('purchase_date') ? ' has-error' : ''); ?>">
                                <label for="purchase_date" class="col-md-4 control-label">Book Purchase Date</label>

                                <div class="col-md-6">
                                    <?php echo e($book->purchase_date); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('quantity') ? ' has-error' : ''); ?>">
                                <label for="quantity" class="col-md-4 control-label">Book Quantity</label>

                                <div class="col-md-6">
                                    <?php echo e($book->quantity); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <label for="price" class="col-md-4 control-label">Book Price</label>

                                <div class="col-md-6">
                                    <?php echo e($book->price); ?>

                                </div>
                            </div>

                            <div style="padding-top:  30px;" class="form-group<?php echo e($errors->has('shelf_id') ? ' has-error' : ''); ?>">
                                <label for="shelves" class="col-md-4 control-label">Book Shelf</label>

                                <div class="col-md-6">
                                    <?php echo e($book->shelf->name); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                                <div class="col-md-12">
                                    <div style="text-align: center" class="form-control">
                                        <label class="control-label"><b>Picture</b></label>
                                    </div> <br>
                                    <img class="img-thumbnail" src="<?php echo e($book->image); ?>" alt="No Image" width="300px">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>