@extends('navbar')
@section('content')
@php if(Auth::user()->is_admin != 1)
    dd("Your are not authorized"); 
@endphp

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
                                            <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#AddContactModal"><i class="d-md-none d-block feather icon-plus white"></i>
                                                <span class="d-md-block d-none">Add Booker</span></button>
                                            <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                            <form method="post" action="{{route('store.booker')}}" enctype="multipart/form-data">
                                                                @csrf
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
                                                                    <!-- <fieldset class="form-group col-12">
                                                                        <input type="file" class="form-control-file" name="attachment" id="user-image">
                                                                    </fieldset> -->
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

                                        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header" style="background-color:;color:">
                                                    <h4 class="modal-title" id="exampleModalLabel">Update User</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group"> 
                                                            <label>User</label><br>
                                                                <input type="text" class="form-control" id="user_name_modal" value="" name="user_name_modal"> <br>
                                                                <input type="hidden" value="" id="user_id_modal" name="user_id_modal">
                                                            <label>Email</label><br>
                                                                <input type="text" class="form-control" id="email_modal" value="" name="email_modal"> <br>
                                                            <label>Protocol</label><br>
                                                                <input required type="radio" name="protocol_modal" value="admin" id="admin"> Admin <br>
                                                                <input type="radio" name="protocol_modal" value="user" id="user"> User<br><br>
                                                            <label>Rights</label><br>
                                                                <input required type="radio" name="accesstype_modal" value="readonly" id="read"> Read Only <br>
                                                                <input type="radio" name="accesstype_modal" value="readwrite" id="write"> Read/Write
                                                        </div>
                                                    </div>
                                                <div class="modal-footer from-group">
                                                <p onclick="updateUser()" style="height:3rem;" class='btn btn-primary' value="">Update</p>
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
                                                        <th>Name</th>
                                                        <th>Email</th> 
                                                        <th>Role</th>
                                                        <th>Rights</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    @foreach($bookers as $key) 
                                                        <tr>  
                                                            <td>
                                                                <div class="media">
                                                                    <!-- <div class="media-left pr-1">
                                                                        <span class="avatar avatar-sm avatar-online rounded-circle">
                                                                        <img src="{{ url('storage/upload/'.$key->file_name) }}" alt="avatar"><i></i></span>
                                                                    </div> -->
                                                                    <div class="media-body media-middle">
                                                                        <a class="media-heading name">{{$key->name}}</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$key->email}}</td> 
                                                            <td>
                                                                @if($key->is_admin == 1)
                                                                    <span class="badge badge-pill badge-primary">Admin</span>
                                                                @elseif($key->is_admin == 0)
                                                                    <span class="badge badge-pill badge-warning">User</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($key->can_write == 1)
                                                                    <span class="badge badge-pill badge-danger">Can Read/Write</span>
                                                                @elseif($key->can_read == 1)
                                                                    <span class="badge badge-pill badge-info">Can Read</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <i id="{{$key->id}}" onclick="deleteUser(this.id)" title="Delete" 
                                                                style="color:red" class="fa fa-trash-o" aria-hidden="true"></i>
                                                                     |
                                                                <a class="user_dialog" data-toggle="modal" data-target="#editUser" data-id="{{$key->id}}" href="">
                                                                    <i title="Edit" style="color:#0066cc" class="fa fa-pencil"  aria-hidden="true"></i> 
                                                                </a>
                                                            </td>
                                                            <!-- <span class="dropdown">
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
                                                            </span> -->
                                                        </td>
                                                        </tr>
                                                    @endforeach
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
                            <div class="card-body border-top-orange border-top-lighten-5">
                                <div class="list-group">
                                    <a href="{{route('create.booker')}}" style="background:#ffa87d" class="list-group-item active">All Bookers</a>
                                    <!-- <a href="#" class="list-group-item list-group-item-action">Recently contacted</a>
                                    <a href="#" class="list-group-item list-group-item-action">Favorite Bookers</a> -->
                                </div>
                            </div>

                            <!-- Groups-->
                            <div class="card-body">
                                <p class="lead">Stats</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary badge-pill float-right">{{$admins}}</span>
                                        <a href="#">Admins</a>
                                    </li> 
                                    <li class="list-group-item">
                                        <span class="badge badge-warning badge-pill float-right">{{$users}}</span>
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

<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script> 
<script>
    function deleteUser(id)
    {
        var request = new XMLHttpRequest();
        request.open("GET", "/deletebooker/"+id, false);
        request.send();
        alert(JSON.parse(request.response));
        window.location.reload();
    }
    $(document).on("click", ".user_dialog", function () { 
        var userId =($(this).data('id'));
        var request = new XMLHttpRequest();
        request.open("GET", "/getbooker/"+userId, false);
        request.send();
        var bookerResponse = JSON.parse(request.response); 
        console.log(bookerResponse);
        var user_name = bookerResponse.name;
        var user_id = bookerResponse.id;
        var email = bookerResponse.email;
        var can_read = bookerResponse.can_read;
        var can_write = bookerResponse.can_write;
        var is_admin = bookerResponse.is_admin;
        $(".modal-body #user_name_modal").val( user_name ); 
        $(".modal-body #user_id_modal").val( user_id ); 
        $(".modal-body #email_modal").val( email ); 
        if (can_read == 1) {
            $(".modal-body #read").prop('checked',true);
        }
        if(can_write == 1){
            $(".modal-body #write").prop('checked',true);
        }

        if (is_admin == 1) {
            $(".modal-body #admin").prop('checked',true);
        }
        if (is_admin == 0) {
            $(".modal-body #user").prop('checked',true);
        }
        
    });
    function updateUser()
    { 
        var userName = document.getElementById('user_name_modal').value;
        var email = document.getElementById('email_modal').value;
        var userId = document.getElementById('user_id_modal').value;
        var protocol = $("input[name='protocol_modal']:checked").val();  
        var access = $("input[name='accesstype_modal']:checked").val();  
        var booker = [];
        booker.push({
            userId,
            userName,
            protocol,
            access,
            email
        });
         
         
        var request = new XMLHttpRequest();
        request.open("get", "/updatebooker/"+JSON.stringify(booker), false);
        request.send();
        window.location.reload();
    }
</script>

@endsection