
<?php $__env->startSection('content'); ?>
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <form method="post" action="<?php echo e(route('store.talent')); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="media mb-2">
                                                <a class="mr-2" href="#">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-26.png" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Profile Picture</h4>
                                                    <div class="col-12 px-0 d-flex">
                                                        <input type="file" name="prfile" id="">
                                                        <!-- <a href="#" class="btn btn-sm btn-primary mr-25">Change</a> -->
                                                        <!-- <a href="#" class="btn btn-sm btn-secondary">Reset</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" class="form-control" required data-validation-required-message="This username field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" class="form-control" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <input type="email" name="email" class="form-control" required data-validation-required-message="This email field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control">
                                                            <option>Fashion Model</option>
                                                            <option>Sports</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="number" class="form-control" name="age" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gallery</label><br>
                                                        <input type="file" name="gallery[]" multiple id="">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ainigma Dev\model_agency\resources\views/createtalent.blade.php ENDPATH**/ ?>