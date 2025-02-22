@extends('navbar')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
        <div class="sidebar-detached sidebar-left">
            <div class="card">
                <ul class="nav  m-auto float-left">
                    @if(Auth::user()->can_write == 1)
                    <li class="nav-item "><a class="nav-link" onclick="deleteTalent(this.id)" title="delete"><i style="color:red" class="ficon feather icon-trash"></i>Delete Talent</a></li>
                    @endif
                </ul>
            </div>
                <div class="sidebar">
                    <div class="bug-list-sidebar-content">
                    <div class="card">
                        <div class="card-head">
                            </div> 
                            <!-- Groups-->
                            <div class="card-body">
                                <p class="lead">Filters</p>
                                <ul class="list-group">
                                    <!-- <li class="list-group-item">
                                        <span class="badge badge-primary badge-pill float-right">3</span>
                                        <a href="#">Categories</a>
                                    </li>   -->
                                    <form method="post" action="{{route('filtertalents')}}">
                                        @csrf
                                        
                                        <!-- <div class="row">
                                            <div class="col">
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <br> -->
                                        <div class="row">
                                            <div class="col">
                                                <select class="form-control" name="category">
                                                    <option value="">Category</option>
                                                    @foreach($categories as $key)
                                                        <option value="{{$key->id}}">{{$key->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="country" class="form-control" placeholder="Country">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <select name="gender" class="form-control">
                                                    <option value="">Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="race">
                                                    <option value="">Race</option>
                                                    @foreach($races as $key)
                                                        <option value="{{$key->id}}">{{$key->race}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <select class="form-control" name="eye_color">
                                                    <option value="">Eye Color</option>
                                                    @foreach($eye_color as $key)
                                                        <option value="{{$key->id}}">{{$key->eye_color}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="hair_color">
                                                    <option value="">Hair Color</option>
                                                    @foreach($hair_color as $key)
                                                        <option value="{{$key->id}}">{{$key->hair_color}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <span class="heightFilter">Height</span>
                                            <div class="collapseheight">
                                                <div class="row">
                                                <div class="col">
                                                    <input type="number" name="height_min" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="height_max" class="form-control" placeholder="Max">
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <span class="heightFilter">Weight</span>
                                            <div class="collapseheight">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" name="weight_min" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="weight_max" class="form-control" placeholder="Max">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="heightFilter">Bust</span>
                                            <div class="collapseheight">
                                                <div class="row">
                                                <div class="col">
                                                    <input type="number" name="bust_min" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="bust_max" class="form-control" placeholder="Max">
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <span class="heightFilter">Hips</span>
                                            <div class="collapseheight">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" name="hips_min" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="hips_max" class="form-control" placeholder="Max">
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <span class="heightFilter">Age</span>
                                            <div class="collapseheight">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" name="age_min" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="col">
                                                    <input type="number" name="age_max" class="form-control" placeholder="Max">
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" style="font-family:alarm clock" value="Filter" class="btn btn-warning"><i class="fa fa-filter"></i> Filter</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                            <button  herf="{{route('home')}}" style="font-family:alarm clock" value="reset" class="btn btn-warning"><i class="fa fa-undo"></i> Reset Filter</button>
                                            </div>
                                        </div>
                                       
                                    </form>

                                </ul>
                            </div>
                            <!--/ Groups--> 
                        </div>
                        <!--/ Predefined Views -->

                    </div>
                </div>
            </div>
                <!-- User Profile Cards with Stats -->
            <section id="user-profile-cards-with-stats" class="row m-auto">
                <div class="col-12">
                    <h1 class="text-uppercase">Talents</h1>
                    <h4 style="font-family:alarm clock" class="text-uppercase">{{$countTalents}} Talents</h4>
                </div>
                @if($profiles->count() == 0)
                <div class="col-12">
                    <h3 class="text-uppercase">No Talents Yet</h3>
                </div>
                @endif
                @foreach($profiles as $profile)
                    <div class="col-xl-3 col-md-8 col-12">
                    
                        <div class="card profile-card-with-stats" style="background-color:#cb592d">
                            <div class="text-center">
                                <div class="container_img">

                                    <a href="{{route('talentinfo', $profile->id)}}">
                                        <img src="{{ url('storage/upload/profile/'.$profile->file_name) }}" alt="Avatar" class="image_pro">
                                        <div class="overlay">
                                        
                                            <div class="text_name">{{$profile->first_name.' '.$profile->last_name}}</div>
                                            <div class="text_info"><br>{{$profile->age}} years<br><span>@</span>{{$profile->instagram}}</div>
                                            <!-- <div class="text_social"></div> -->
                                        </div>
                                    </a>
                                    
                                </div>
                                <input type="checkbox" name="talent[]" class="form-control mycheckbox" id="{{$profile->id}}" value="{{$profile->id}}" style="height:1.5rem">
                                <!-- <div class="card-body">
                                    <button type="button" class="btn btn-outline-primary btn-md mr-1"><i class="feather icon-user"></i> Profile</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach

            </section>
        </div>
    </div>
  
</div>
    <!-- END: Content-->

    <script>

    var coll = document.getElementsByClassName("heightFilter");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }    

    function deleteTalent()
    {
        var talent = [];
        var talentId = "";
        document.querySelectorAll('.mycheckbox').forEach(function(elem) {
            if (elem.checked) {
                talentId = elem.value;
                talent.push({talentId});
            } 
        }); 
        console.log(JSON.stringify(talent));
        var request = new XMLHttpRequest();
        request.open("GET", "/deletetalent/"+JSON.stringify(talent), false);
        request.send();
        //alert(JSON.parse(request.response));
        window.location.reload();
    }
    </script>

@endsection