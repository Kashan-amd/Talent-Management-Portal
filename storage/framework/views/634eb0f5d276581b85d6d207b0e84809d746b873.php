
<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->can_write != 1)
    dd("Your are not authorized"); 
?>

<div class="app-content content">
    <div class="content-wrapper row">

        <div class="sidebar-detached sidebar-left col-md-3">
            <div class="sidebar">
                <div class="bug-list-sidebar-content">
                <div class="card">
                    <div class="card-head">
                            <div class="media p-1">
                                Utilities Management
                            </div>
                        </div>
                        <!-- contacts view -->
                        <div class="card-body border-top-orange border-top-lighten-5">
                            <div class="list-group">
                                <a href="<?php echo e(route('create.utility')); ?>" style="background:#ffa87d" class="list-group-item active">All Utilities</a>
                                <!-- <a href="#" class="list-group-item list-group-item-action">Recently contacted</a>
                                <a href="#" class="list-group-item list-group-item-action">Favorite Bookers</a> -->
                            </div>
                        </div>

                        <!-- Groups-->
                        <div class="card-body">
                            <p class="lead">Stats</p>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge badge-primary badge-pill float-right"><?php echo e($totalRaces); ?></span>
                                    <a href="#">Race</a>
                                </li>  
                                <li class="list-group-item">
                                    <span class="badge badge-primary badge-pill float-right"><?php echo e($totalEyes); ?></span>
                                    <a href="#">Eye Color</a>
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-primary badge-pill float-right"><?php echo e($totalHairs); ?></span>
                                    <a href="#">Hair Color</a>
                                </li>  
                            </ul>
                        </div>
                        <!--/ Groups--> 
                    </div>
                    <!--/ Predefined Views -->

                </div>
        </div>

    </div>

        <div class="content-body col-md-9">
            <section class="users-edit">
                <div class="card">
                    <div class="alert alert-warning">
                        <p>Please note, if you delete any utility, it'll effect the talent profile with the corresponding utility.</p>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="race-tab" data-toggle="tab" href="#race" aria-controls="race" role="tab" aria-selected="true">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Race</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="eye-tab" data-toggle="tab" href="#eye" aria-controls="infoeyermation" role="tab" aria-selected="false">
                                        <i class="feather icon-eye mr-25"></i><span class="d-none d-sm-block">Eye Color</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="hair-tab" data-toggle="tab" href="#hair" aria-controls="hair" role="tab" aria-selected="false">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Hair Color</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <div class="tab-content">

                                <!-- race form starts -->
                                <div class="tab-pane active" id="race" aria-labelledby="race-tab" role="tabpanel">
                                    <div class="card-content">
                                        <div class="card-body">

                                        <!-- Task List table -->
                                            <div class="card">
                                                <h4 class="card-title">Race</h4>
                                                <div class="heading-elements mt-0">
                                                <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#AddRaceModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                                    <span class="d-md-block d-none">Add Race</span></button>
                                                <div class="modal fade" id="AddRaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <section class="contact-form">
                                                                <form method="post" action="<?php echo e(route('store.race')); ?>" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel1">Add New Race</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <fieldset class="form-group col-12">
                                                                            <label for="">Race Name</label>
                                                                            <input required type="text" id="contact-name" name="race" class="contact-name form-control" > 
                                                                        </fieldset> 
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                            <button type="submit" id="" class="btn btn-info"><i class="fa fa-paper-plane-o d-block d-lg-none"></i> <span class="d-none d-lg-block">Add New</span></button>
                                                                        </fieldset>
                                                                    </div>
                                                                </form>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    
                                        <div class="table-responsive">
                                            <table id="" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                    <tr> 
                                                        <th>Race</th> 
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $races; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>  
                                                            <td><?php echo e($key->race); ?></td>
                                                            <td>
                                                                <i id="<?php echo e($key->id); ?>" onclick="deleteRace(this.id)" title="Delete" 
                                                                    style="color:red" class="fa fa-trash" aria-hidden="true">
                                                                <!-- </i> 
                                                                |
                                                                <a class="user_dialog" data-toggle="modal" data-target="#editCategory" data-id="" href="<?php echo e($key->id); ?>">
                                                                    <i title="Edit" style="color:#0066cc" class="fa fa-pencil"  aria-hidden="true"></i> 
                                                                </a> -->
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- race form ends -->
                                        
                            </div>

                                <!-- eye form starts -->
                                <div class="tab-pane" id="eye" aria-labelledby="eye-tab" role="tabpanel">
                                    <div class="card-content">
                                        <div class="card-body">

                                        <!-- Task List table -->
                                        <div class="card">
                                            <h4 class="card-title">Eye Color</h4>
                                            <div class="heading-elements mt-0">
                                            <button class="btn btn-warning btn-md" style="margin-bottom:2rem" data-toggle="modal" data-target="#AddEyesModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                                <span class="d-md-block d-none">Add Eye Color</span></button>
                                            <div class="modal fade" id="AddEyesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                            <form method="post" action="<?php echo e(route('store.eyes')); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel2">Add New Eye Color</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        <label for="">Eye Color</label>
                                                                        <input required type="text" id="contact-name" name="eye_color" class="contact-name form-control" > 
                                                                    </fieldset> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                        <button type="submit" id="" class="btn btn-info"><i class="fa fa-paper-plane-o d-block d-lg-none"></i> <span class="d-none d-lg-block">Add New</span></button>
                                                                    </fieldset>
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                
                                        <div class="table-responsive">
                                            <table id="" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                    <tr> 
                                                        <th>Eye Color</th> 
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $eyes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>  
                                                            <td><?php echo e($key->eye_color); ?></td>
                                                            <td>
                                                                <i id="<?php echo e($key->id); ?>" onclick="deleteEyes(this.id)" title="Delete" 
                                                                    style="color:red" class="fa fa-trash" aria-hidden="true">
                                                                <!-- </i> 
                                                                |
                                                                <a class="user_dialog" data-toggle="modal" data-target="#editCategory" data-id="" href="">
                                                                    <i title="Edit" style="color:#0066cc" class="fa fa-pencil"  aria-hidden="true"></i> 
                                                                </a> -->
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- eye form ends -->

                            </div>
                        </div>

                            <!-- hair form starts -->
                            <div class="tab-pane" id="hair" aria-labelledby="hair-tab" role="tabpanel">
                                <div class="card-content">
                                    <div class="card-body">

                                    <!-- Task List table -->
                                    <div class="card">
                                        <h4 class="card-title">Hair Color</h4>
                                        <div class="heading-elements mt-0">
                                        <button class="btn btn-warning btn-md" style="margin-bottom:2rem" data-toggle="modal" data-target="#AddHairModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                            <span class="d-md-block d-none">Add Hair Color</span></button>
                                        <div class="modal fade" id="AddHairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <section class="contact-form">
                                                        <form method="post" action="<?php echo e(route('store.hair')); ?>" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel3">Add New Hair Color</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <fieldset class="form-group col-12">
                                                                    <label for="">Hair Color</label>
                                                                    <input required type="text" id="contact-name" name="hair_color" class="contact-name form-control" > 
                                                                </fieldset> 
                                                            </div>
                                                            <div class="modal-footer">
                                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                    <button type="submit" id="" class="btn btn-info"><i class="fa fa-paper-plane-o d-block d-lg-none"></i> <span class="d-none d-lg-block">Add New</span></button>
                                                                </fieldset>
                                                            </div>
                                                        </form>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                            
                                    <div class="table-responsive">
                                        <table id="" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                            <thead>
                                                <tr> 
                                                    <th>Hair Color</th> 
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $hairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>  
                                                        <td><?php echo e($key->hair_color); ?></td>
                                                        <td>
                                                            <i id="<?php echo e($key->id); ?>" onclick="deleteHair(this.id)" title="Delete" 
                                                                style="color:red" class="fa fa-trash" aria-hidden="true">
                                                            <!-- </i> 
                                                            |
                                                            <a class="user_dialog" data-toggle="modal" data-target="#editCategory" data-id="" href="">
                                                                <i title="Edit" style="color:#0066cc" class="fa fa-pencil"  aria-hidden="true"></i> 
                                                            </a> -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- hair form ends -->

                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

<script>
    function deleteRace(id)
    {
        var request = new XMLHttpRequest();
        request.open("GET", "/deleterace/"+id, false);
        request.send();
        //alert(JSON.parse(request.response));
        window.location.reload();
    }
    function deleteEyes(id)
    {
        var request = new XMLHttpRequest();
        request.open("GET", "/deleteeyes/"+id, false);
        request.send();
        //alert(JSON.parse(request.response));
        window.location.reload();
    }
    function deleteHair(id)
    {
        var request = new XMLHttpRequest();
        request.open("GET", "/deletehair/"+id, false);
        request.send();
        //alert(JSON.parse(request.response));
        window.location.reload();
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ainigma Dev\model_agency\resources\views/utility.blade.php ENDPATH**/ ?>