@extends('navbar')
@section('content')
@php if(Auth::user()->can_write != 1)
    dd("Your are not authorized"); 
@endphp
<style>
    #pageloader
    {
    background: rgba( 255, 255, 255, 0.8 );
    display: none;
    height: 100%;
    position: fixed;
    width: 100%;
    z-index: 9999;
    }

    #pageloader img
    {
    left: 35%;
    margin: auto;
    top: 5%;
    position: absolute;
    }
</style>
<div id="pageloader"> 
    <img src="../../../assets/loading.gif" alt="processing..." />
</div>

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
                                <div id="msg_alert" class="">
                                    <lable id="msg"></lable>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert_btn" style="display:none">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif 
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                        <!-- users edit media object start -->
                                        <form id="talentform" method="post" action="{{route('store.talent')}}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- @foreach($profile as $profile)
                                            <div class="media mb-2">
                                                <a class="mr-2" href="#">
                                                    <img src="{{ url('storage/upload/'.$profile->file_name) }}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                                </a>
                                            @endforeach -->
                                                <div class="media-body">
                                                    <h4 class="media-heading"><b>Profile Picture <span style="color:red"> *</span></b></h4>
                                                    <div class="col-12 px-0 d-flex">
                                                        <input type="file" accept="image/png, image/gif, image/jpeg" required name="profile" id="pp">
                                                        <!-- <a href="#" class="btn btn-sm btn-primary mr-25">Change</a> -->
                                                        <!-- <a href="#" class="btn btn-sm btn-secondary">Reset</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                            <br>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <h3>Basic Info</h3>
                                                    <div class="form-group">
                                                        <label><b>Category <span style="color:red"> *</span></b></label>
                                                        <select class="form-control" name="category">
                                                            <option value="">--select--</option>
                                                            @foreach($categories as $key)
                                                                <option value="{{$key->id}}">{{$key->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label><b>First Name <span style="color:red"> *</span></b></label>
                                                            <input type="text" name="first_name" class="form-control" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label><b>Last Name <span style="color:red"> *</span></b></label>
                                                            <input type="text" name="last_name" class="form-control" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Race <span style="color:red"> *</span></b></label>
                                                        <select class="form-control" name="race">
                                                            <option value="">--select--</option>
                                                            @foreach($races as $key)
                                                                <option value="{{$key->id}}">{{$key->race}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Country</label>
                                                            <input type="text" name="country" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label><b>Gender <span style="color:red"> *</span></b></label>
                                                            <select name="gender" id="gender" class="form-control" required data-validation-required-message="This field is required">
                                                                <option value="">--select--</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Artistic Name</label>
                                                            <input type="text" name="artistic_name" class="form-control" data-validation-required-message="This name field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Legal Tutor</label>
                                                            <input type="text" name="tutor" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label><b>Date Of Birth <span style="color:red"> *</span></b></label>
                                                            <input type="date" name="dob" class="form-control" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <input type="email" name="email" class="form-control" data-validation-required-message="This email field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" data-validation-required-message="This email field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Instagram</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="instagram" aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                                <!-- <input type="text" name="instagram" class="form-control" required data-validation-required-message="This field is required"> -->
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Gallery</label><br>
                                                        <input accept="image/png, image/gif, image/jpeg" type="file" name="gallery[]" multiple id="gallery_imgs">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <h3>Measurements</h3>
                                                    
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Height</label>
                                                            <input type="number" name="height" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Bust</label>
                                                            <input type="number" name="bust" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Waist</label>
                                                            <input type="number" name="waist" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Hips</label>
                                                            <input type="number" name="hips" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Weight</label>
                                                            <input type="number" name="weight" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Eye Color <span style="color:red"> *</span></b></label>
                                                        <select class="form-control" name="eye_color">
                                                            <option value="">--select--</option>
                                                            @foreach($eye_color as $key)
                                                                <option value="{{$key->id}}">{{$key->eye_color}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Hair Color <span style="color:red"> *</span></b></label>
                                                        <select class="form-control" name="hair_color">
                                                            <option value="">--select--</option>
                                                            @foreach($hair_color as $key)
                                                                <option value="{{$key->id}}">{{$key->hair_color}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Shoulders</label>
                                                            <input type="text" name="shoulders" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Number of Shoes</label>
                                                            <input type="text" name="number_of_shoes" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <h3>Documnents and Bank Info</h3>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>CPF</label>
                                                            <input type="text" name="cfr" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>RG</label>
                                                            <input type="text" name="rg" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>DRT</label>
                                                            <input type="text" name="drt" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>PIX</label>
                                                            <input type="text" name="pix" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Bank</label>
                                                            <input type="text" name="bank" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Agency</label>
                                                            <input type="text" name="agency" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Account Number</label>
                                                            <input type="text" name="accountnumber" class="form-control" data-validation-required-message="This field is optional">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div id="msg_alert_gallery" class="">
                                                    <lable id="msg_gallery"></lable>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert_btn_gallery" style="display:none">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button onclick="checkProfilePicture()" type="submit" class="btn btn-warning glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        function checkProfilePicture()
        {
            if (document.getElementById("pp").value == "") {
                document.getElementById("msg").innerHTML = "NO PROFILE PICTURE SET";
                document.getElementById('msg_alert').className = 'alert alert-danger alert-dismissible fade show';
                document.getElementById("msg").style.fontFamily = "alarm clock";
                document.getElementById("alert_btn").style.display = "block";
            }
            if (document.getElementById("gallery_imgs").value == "") {
                document.getElementById("msg_gallery").innerHTML = "NO GALLERY PICTURE SELECTED";
                document.getElementById('msg_alert_gallery').className = 'alert alert-danger alert-dismissible fade show';
                document.getElementById("msg_gallery").style.fontFamily = "alarm clock";
                document.getElementById("alert_btn_gallery").style.display = "block";
            }
        }
        $(document).ready(function(){
            $("#talentform").on("submit", function(){ 
                $("#pageloader").fadeIn();
            });//submit
        });
    </script>
@endsection