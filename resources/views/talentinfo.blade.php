@extends('navbar')
@section('content')
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

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="talentupdateform" action="{{route('updatetalent')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row" style="margin:auto">

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label>Profile Picture</label>
                                    <input type="file" accept="image/png, image/gif, image/jpeg" name="profile" id="">  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>First Name</label>
                                    <input type="hidden" value="{{$talent->id}}" name="talentid">
                                    <input type="text" value="{{$talent->first_name}}" name="first_name" class="form-control" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Last Name</label>
                                    <input type="text" value="{{$talent->last_name}}" name="last_name" class="form-control" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Race</label>
                                <select class="form-control" name="race">
                                    <option value="{{$talent->race_id}}">{{$talent->races->race}}</option>
                                    @foreach($races as $key)
                                        @if($key->id != $talent->race_id)
                                            <option value="{{$key->id}}">{{$key->race}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Country</label>
                                    <input type="text" value="{{$talent->country}}" name="country" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Gender</label>
                                    <input type="text" value="{{$talent->gender}}" id="{{$talent->id}}" name="gender" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Artistic Name</label>
                                    <input type="text"  value="{{$talent->artistic_name}}" name="artistic_name" class="form-control" required data-validation-required-message="This name field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Legal Tutor</label>
                                    <input type="text"  value="{{$talent->tutor_name}}" name="tutor" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Talent Category</label>
                                <select class="form-control" name="talent_category">
                                    <option value="{{$talent->category_id}}">{{$talent->talent_categories->category_name}}</option>
                                    @foreach($categories as $key)
                                        @if($talent->category_id != $key->id)
                                            <option value="{{$key->id}}">{{$key->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Date Of Birth</label>
                                    <input type="date" value="{{$talent->dob}}" name="dob" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Phone</label>
                                    <input type="text"  value="{{$talent->phone}}" name="phone" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label>E-mail</label>
                                    <input type="email" value="{{$talent->email}}" name="email" class="form-control" required data-validation-required-message="This email field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Address</label>
                                    <input type="text" value="{{$talent->address}}" name="address" class="form-control" required data-validation-required-message="This email field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Instagram</label>
                                    <input type="text" value="{{$talent->instagram}}" name="instagram" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>CPF</label>
                                    <input type="text" value="{{$talent->cpf}}" name="cpf" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="controls">
                                    <label>RG</label>
                                    <input type="text" value="{{$talent->rg}}" name="rg" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>DRT</label>
                                    <input type="text" value="{{$talent->drt}}" name="drt" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>PIX</label>
                                    <input type="text" value="{{$talent->pix}}" name="pix" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Bank</label>
                                    <input type="text" value="{{$talent->bank}}" name="bank" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Agency</label>
                                <input type="text" value="{{$talent->agency}}" name="agency" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" value="{{$talent->accountnumber}}" name="accountnumber" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <label>Height</label>
                                    <input type="text" value="{{$talent->height}}" name="height" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="controls">
                                    <label>Bust</label>
                                    <input type="text" value="{{$talent->bust}}" name="bust" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Waist</label>
                                    <input type="text" value="{{$talent->waist}}" name="waist" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Hips</label>
                                    <input type="text" value="{{$talent->hips}}" name="hips" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Weight</label>
                                    <input type="text" value="{{$talent->weight}}" name="weight" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Eye Color</label>
                                <select class="form-control" name="eye_color">
                                    <option value="{{$talent->eye_color_id}}">{{$talent->eye_colors->eye_color}}</option>
                                    @foreach($eye_color as $key)
                                        @if($talent->eye_color_id !=  $key->id)
                                            <option value="{{$key->id}}">{{$key->eye_color}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hair Color</label>
                                <select class="form-control" name="hair_color">
                                    <option value="{{$talent->hair_color_id}}">{{$talent->hair_colors->hair_color}}</option>
                                    @foreach($hair_color as $key)
                                        @if($talent->hair_color_id != $key->id)
                                            <option value="{{$key->id}}">{{$key->hair_color}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Shoulders</label>
                                    <input type="text" value="{{$talent->shoulders}}" name="shoulders" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Number of Shoes</label>
                                    <input type="text" value="{{$talent->number_of_shoes}}" name="number_of_shoes" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gallery</label><br>
                                <input accept="image/png, image/gif, image/jpeg" type="file" name="gallery[]" multiple id="">
                            </div>
                            <button type="submit" class="btn btn-warning glow mb-1 mb-sm-0 mr-0 mr-sm-0">Save changes</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <section id="user-profile-cards-with-stats" class="row m-auto">
                <div class="col-12">
                    <h1 class="text-uppercase">Talent</h1>
                </div>
                    <br><br><br>
                <div class="col-12 col-md-3 container_img">
                    <a>
                        <img src="{{ url('storage/upload/profile/'.$talent->file_name) }}" alt="Avatar" class="image_pro">
                    </a>
                </div>

                    <div class="card col-md-9">
                    <div class="card-header">
                    
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">  
                            <!-- <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li> -->
                            <li>
                            @if(Auth::user()->is_admin == 1) 
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#default">
                                    Edit
                                </button>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
                        <div class="card-content ">
                            <div class="card-body ">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th><h2 style="font-family:alarm clock">Basic Info</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{$talent->first_name}} {{$talent->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$talent->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{$talent->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>
                                                        @if($talent->talent_categories != null || $talent->talent_categories != "")
                                                            <span class="badge badge-success users-view-status">{{$talent->talent_categories->category_name}}</span>
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td><span class="badge badge-info users-view-status">Yet to Develop</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Race</th>
                                                    <td>
                                                        @if($talent->races != null || $talent->races != "")
                                                            {{$talent->races->race}}
                                                        @endif 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>country</th>
                                                    <td>{{$talent->country}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Artistic Name</th>
                                                    <td>{{$talent->artistic_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Legal Tutor</th>
                                                    <td>{{$talent->tutor_name}}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th><h2 style="font-family:alarm clock">Specifications</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>{{$talent->dob}}  ({{$talent->age}} years)  </td>
                                                </tr>
                                                <tr>
                                                    <th>Height</th>
                                                    <td>{{$talent->height}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bust</th>
                                                    <td>{{$talent->bust}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Waist</th>
                                                    <td>{{$talent->waist}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Hips</th>
                                                    <td>{{$talent->hips}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>{{$talent->weight}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Eye Color</th>
                                                    <td>
                                                        @if($talent->eye_colors != null || $talent->eye_colors != "")
                                                            {{$talent->eye_colors->eye_color}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Hair</th>
                                                    <td>
                                                        @if($talent->hair_colors != null || $talent->hair_colors != "")
                                                            {{$talent->hair_colors->hair_color}}
                                                        @endif 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shoulders</th>
                                                    <td>{{$talent->shoulders}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Number Of Shoes</th>
                                                    <td>{{$talent->number_of_shoes}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th><h2 style="font-family:alarm clock">Document Info</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>CPF</th>
                                                    <td>{{$talent->cpf}}</td>
                                                </tr>
                                                <tr>
                                                    <th>RG</th>
                                                    <td>{{$talent->rg}}</td>
                                                </tr>
                                                <tr>
                                                    <th>DRT</th>
                                                    <td>{{$talent->drt}}</td>
                                                </tr>
                                                <tr>
                                                    <th>PIX</th>
                                                    <td>{{$talent->pix}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank</th>
                                                    <td>{{$talent->bank}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Agency</th>
                                                    <td>{{$talent->agency}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Account Number</th>
                                                    <td>{{$talent->accountnumber}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th><h2 style="font-family:alarm clock">Contacts</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{$talent->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Instagram</th>
                                                    <td>{{$talent->instagram}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{$talent->address}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <section id="image-grid" class="card">
                <div class="card-header">
                    <h4 class="card-title">Talent Gallery</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li> 
                            <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            <!-- <li><a data-action="close"><i class="feather icon-x"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <!-- <div class="card-body">
                        <div class="card-text">
                            <p>Your Gallery</p>
                        </div>
                    </div> -->
                    <div class="masonry-grid my-gallery mx-1" itemscope itemtype="http://schema.org/ImageGallery">
                        <!-- width of .grid-sizer used for columnWidth -->
                        <div class="grid-sizer"></div> 
                        @foreach($talent->galleries as $item) 
                        <div class="grid-item">  
                            <figure class="card" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a target="_blank" onClick='openImage(this)'>
                                    <img class="img-thumbnail" src="{{ url('storage/upload/gallery/'.$item->file_name) }}" itemprop="thumbnail" alt="Gallery" />
                                </a> 
                            </figure> 
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Root element of PhotoSwipe. Must have class pswp. -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                <!-- Background of PhotoSwipe. 
            It's a separate element as animating opacity is faster than rgba(). -->
                <div class="pswp__bg"></div>
                <!-- Slides wrapper with overflow:hidden. -->
                <div class="pswp__scroll-wrap">
                    <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>
                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                    <div class="pswp__ui pswp__ui--hidden">
                        <div class="pswp__top-bar">
                            <!--  Controls are self-explanatory. Order can be changed. -->
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                            <!-- element will get class pswp__preloader-active when preloader is running -->
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>
                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                        </button>
                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                        </button>
                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openImage(element) {
        var newTab = window.open();
        setTimeout(function() {
            newTab.document.body.innerHTML = element.innerHTML;
        }, 500);
        return false;
    }
    $(document).ready(function(){
        $("#talentform").on("submit", function(){ 
            $("#pageloader").fadeIn();
        });//submit
    });
</script>                
@endsection