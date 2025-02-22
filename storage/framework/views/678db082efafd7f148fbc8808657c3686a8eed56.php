;
<?php $__env->startSection('content'); ?>;


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-detached content-right">
                <div class="content-body">
                    <div class="content-overlay"></div>
                   

                    <section class="row all-contacts">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                        <h4 class="card-title">All Bookers</h4>
                                        <div class="heading-elements mt-0">
                                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#AddContactModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                                <span class="d-md-block d-none">Add Booker</span></button>
                                            <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                            <form method="post" action="<?php echo e(route('store.booker')); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Add New Booker</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        <label for="">Name</label>
                                                                        <input required type="text" id="contact-name" name="name" class="contact-name form-control" > 
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <label for="">Email</label>
                                                                        <input required type="text" id="contact-email" name="email" class="contact-email form-control" >
                                                                    </fieldset>
                                                                    <!-- <fieldset class="form-group col-12">
                                                                        <label for="">Phone #</label>
                                                                        <input type="text" id="contact-phone" name="phone" class="contact-phone form-control" >
                                                                    </fieldset> -->
                                                                    <fieldset class="form-group col-12">
                                                                        <label for="">Password</label>
                                                                        <input required type="text" name="password" class="form-control">
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <label class="font-weight-bold" for="">Access Type</label><br>
                                                                        <input required type="radio" name="accesstype" value="readonly" id=""> Read Only<br>
                                                                        <input type="radio" name="accesstype" value="readwrite" id=""> Read/Write
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <label class="font-weight-bold" for="">Protocol</label><br>
                                                                        <input required type="radio" name="protocol" value="admin" id=""> Admin<br>
                                                                        <input type="radio" name="protocol" value="user" id=""> User
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <input type="file" class="form-control-file" name="attachment" id="user-image">
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
                                            <div class="modal fade" id="EditContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                            <form id="form-edit-contact" class="contact-input">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        <input type="text" id="name" class="name form-control" placeholder="Name">
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <input type="text" id="email" class="email form-control" placeholder="Email">
                                                                    </fieldset>
                                                                    <fieldset class="form-group col-12">
                                                                        <input type="text" id="phone" class="phone form-control" placeholder="Phone Number">
                                                                    </fieldset>
                                                                    <span id="fav" class="d-none"></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                        <button type="button" id="edit-contact-item" class="btn btn-info edit-contact-item" data-dismiss="modal"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Edit</span></button>
                                                                    </fieldset>
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                       
                                        <div class="table-responsive">
                                            <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                    <tr> 
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Role</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    <?php $__currentLoopData = $bookers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <tr>  
                                                            <td>
                                                                <div class="media">
                                                                    <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle">
                                                                        <img src="<?php echo e(url('storage/upload/'.$key->file_name)); ?>" alt="avatar"><i></i></span></div>
                                                                    <div class="media-body media-middle">
                                                                        <a class="media-heading name"><?php echo e($key->name); ?></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><?php echo e($key->email); ?></td> 
                                                            <td>
                                                                <?php if($key->is_admin == 1): ?>
                                                                    <span class="badge badge-pill badge-primary">Admin</span>
                                                                <?php elseif($key->is_admin == 0): ?>
                                                                    <span class="badge badge-pill badge-warning">User</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                            <a data-toggle="modal" data-target="#EditContactModal" class="primary edit mr-1"><i class="fa fa-pencil"></i></a>
                                                            <a class="danger delete mr-1"><i class="fa fa-trash-o"></i></a>
                                                            <span class="dropdown">
                                                                <a id="btnSearchDrop31" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle dropdown-menu-right"><i class="fa fa-ellipsis-v"></i></a>
                                                                <span aria-labelledby="btnSearchDrop31" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <a data-toggle="modal" data-target="#EditContactModal" class="dropdown-item edit"><i class="feather icon-edit-2"></i>
                                                                        Edit</a>
                                                                    <a href="#" class="dropdown-item delete"><i class="feather icon-trash-2"></i> Delete</a>
                                                                    <a href="#" class="dropdown-item"><i class="feather icon-plus-circle primary"></i> Projects</a>
                                                                    <a href="#" class="dropdown-item"><i class="feather icon-plus-circle info"></i> Team</a>
                                                                    <a href="#" class="dropdown-item"><i class="feather icon-plus-circle warning"></i> Clients</a>
                                                                    <a href="#" class="dropdown-item"><i class="feather icon-plus-circle success"></i> Friends</a>
                                                                </span>
                                                            </span>
                                                        </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <div class="bug-list-sidebar-content">
                    <div class="card">
                        <div class="card-head">
                                <div class="media p-1">
                                    Bookers Management
                                </div>
                            </div>
                            <!-- contacts view -->
                            <div class="card-body border-top-blue-grey border-top-lighten-5">
                                <div class="list-group">
                                    <a href="<?php echo e(route('createbooker')); ?>" class="list-group-item active">All Bookers</a>
                                    <!-- <a href="#" class="list-group-item list-group-item-action">Recently contacted</a>
                                    <a href="#" class="list-group-item list-group-item-action">Favorite Bookers</a> -->
                                </div>
                            </div>

                            <!-- Groups-->
                            <div class="card-body">
                                <p class="lead">Stats</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary badge-pill float-right"><?php echo e($admins); ?></span>
                                        <a href="#">Admins</a>
                                    </li> 
                                    <li class="list-group-item">
                                        <span class="badge badge-warning badge-pill float-right"><?php echo e($users); ?></span>
                                        <a href="#">Bookers</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!--/ Groups--> 
                        </div>
                        <!--/ Predefined Views -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ainigma Dev\model_agency\resources\views/createbooker.blade.php ENDPATH**/ ?>