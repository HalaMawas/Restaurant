@extends('master')
@section('content')
 <!-- Menu Start -->
        <div class="menu">
            <div class="container">
                <div class="section-header text-center">
                    <p></p>
                    <h2>{{$category->{'name_'.LaravelLocalization::getCurrentLocale()} }}</h2>
                </div>
                <div class="menu-tab">
                    <!-- <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#burgers">Burgers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#snacks">Snacks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#beverages">Beverages</a>
                        </li>
                    </ul> -->
                    <div class="tab-content">
                        <div id="burgers" class="container tab-pane active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    @foreach($category->meals as $meal)
                                    
                                     
                                     <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="{{url("imageMeals/{$meal->image}")}}" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><a href='{{url("meal-detail/{$meal->id}?table={$table}")}}'><span>{{$meal->{'name_'.LaravelLocalization::getCurrentLocale()} }}</span> <strong>{{$meal->price.' .KWD'}}</strong>
                                            </a></h3>
                                            <p>{{$meal->{'description_'.LaravelLocalization::getCurrentLocale()} }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                   
                                   
                                   
                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                    <img src='{{url("category_image/{$category->image}")}}' alt="Image">
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
@endsection