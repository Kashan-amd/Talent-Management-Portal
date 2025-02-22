
<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->is_admin != 1)
    dd("Your are not authorized"); 
?>

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
                                        <h4 class="card-title">All Categories</h4>
                                        <div class="heading-elements mt-0">
                                            <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#AddContactModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                                <span class="d-md-block d-none">Add Category</span></button>
                                            <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                            <form method="post" action="<?php echo e(route('store.category')); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Add New Category</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        <label for="">Name</label>
                                                                        <input required type="text" id="contact-name" name="category_name" class="contact-name form-control" > 
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

                                            <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header" style="background-color:;color:">
                                                    <h4 class="modal-title" id="exampleModalLabel">Update Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        
                                                        <div class="form-group"> 
                                                            <label>Category</label><br>
                                                                <input type="text" class="form-control" id="category_modal" value="" name="category_modal"> <br>
                                                                <input type="hidden" value="" id="category_id_modal" name="category_id_modal">
                                                        </div>
                                                    </div>
                                                <div class="modal-footer from-group">
                                                <p onclick="updateCategory()" style="height:3rem;" class='btn btn-primary' value="">Update</p>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                                 
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
                                                        <th>Category</th> 
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <tr>  
                                                            <td><?php echo e($key->category_name); ?></td>
                                                            <td>
                                                                <i id="<?php echo e($key->id); ?>" onclick="deleteCategory(this.id)" title="Delete" 
                                                                    style="color:red" class="fa fa-trash" aria-hidden="true">
                                                                </i> 
                                                                |
                                                                <a class="user_dialog" data-toggle="modal" data-target="#editCategory" data-id="<?php echo e($key->id); ?>" href="">
                                                                    <i title="Edit" style="color:#0066cc" class="fa fa-pencil"  aria-hidden="true"></i> 
                                                                </a>
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
                                    Categories Management
                                </div>
                            </div>
                            <!-- contacts view -->
                            <div class="card-body border-top-orange border-top-lighten-5">
                                <div class="list-group">
                                    <a href="<?php echo e(route('create.booker')); ?>" style="background:#ffa87d" class="list-group-item active">All Categories</a>
                                    <!-- <a href="#" class="list-group-item list-group-item-action">Recently contacted</a>
                                    <a href="#" class="list-group-item list-group-item-action">Favorite Bookers</a> -->
                                </div>
                            </div>

                            <!-- Groups-->
                            <div class="card-body">
                                <p class="lead">Stats</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary badge-pill float-right"><?php echo e($totalCategories); ?></span>
                                        <a href="#">Categories</a>
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
    <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script> 
    <script>
    function deleteCategory(id)
    {
        var request = new XMLHttpRequest();
        request.open("GET", "http://127.0.0.1:8000/deletecategory/"+id, false);
        request.send();
        //alert(JSON.parse(request.response));
        window.location.reload();
    }
    $(document).on("click", ".user_dialog", function () { 
        var categoryId =($(this).data('id'));
        var request = new XMLHttpRequest();
        request.open("GET", "/getcategory/"+categoryId, false);
        request.send();
        var categoryResponse = JSON.parse(request.response); 
        console.log(categoryResponse);
        var category_name_modal = categoryResponse.category_name_modal;
        var category_id = categoryResponse.id;
        $(".modal-body #category_modal").val( category_name_modal ); 
        $(".modal-body #category_id_modal").val( category_id ); 
    });
    function updateCategory()
    { 
        var categoryName = document.getElementById('category_modal').value;
        var categoryId = document.getElementById('category_id_modal').value;
        var request = new XMLHttpRequest();
        request.open("GET", "/updatecategory/"+categoryName+"/"+categoryId, false);
        request.send();
        window.location.reload();
    };
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ainigma Dev\model_agency\resources\views/category.blade.php ENDPATH**/ ?>