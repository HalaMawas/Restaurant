@extends('master')
@section('style')
<style type="text/css">
    button.btn {
    margin-top: 10px;
    padding: 5px 15px;
}
</style>
@endsection
@section('content')
 <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>{{$meal->category->{'name_'.LaravelLocalization::getCurrentLocale()} }}</p>
                    <h2>{{$meal->{'name_'.LaravelLocalization::getCurrentLocale()} }}</h2>
                </div>
                <form class="form-horizontal" role="form" id="myForm" action="{{url('add-basket')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if (session('error'))
                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <div class="alert alert-danger" style="text-align: center;">
                                    {!! session('error') !!}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="row">
                            <div class="form-group col-md-12 " style="text-align: center;">

                                <div class="alert alert-success">
                                    {!! session('success') !!}
                                </div>
                            </div>
                        </div>
                        @endif
                <div class="row">
                    <input type="text" name="meal" value="{{$meal->id}}" hidden>
                    <input type="text" name="table" value="{{$table}}" hidden>
                   
                    <div class=" offset-md-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src='{{url("imageMeals/{$meal->image}")}}'  alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title"></h2>
                                <div class="blog-meta">
                                    @isset($meal->price)
                                    <p><i class="fas fa-cash-register   " style="padding-left:5px"></i>{{__('main.price')}} : {{$meal->price.' .KWD'}}</p>
                                    @endif
                                    @isset($meal->weight)
                                    <p><i class="fas fa-weight-hanging  " style="padding-left:5px"></i>{{__('main.weight')}} :  {{$meal->weight}}</p>
                                    @endisset
                                   
                                </div>
                               
                                <div class="blog-text">
                                    <p>
                                        {{$meal->{'description_'.LaravelLocalization::getCurrentLocale()} }}
                                    </p>
                                   
                                </div>

                                 <div class="blog-text">
                                      @foreach($meal->extraMeals as $extrameal)
                                     <div class="menu-item">
                                        
                                        <div class="menu-text">
                                            <!-- <h3> -->
                                           <input type="checkbox"  name="extraoption[]" value="{{$extrameal->id}}">
                                            <label for="vehicle1">{{$extrameal->{'name_'.LaravelLocalization::getCurrentLocale()} }}</label><br>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button style=" margin-top: 10px;
    padding: 5px 15px;" class="btn custom-btn" >{{__('main.add-cart')}}</button>
                                    <a  class="btn custom-btn" href='{{url("meals/$meal->category_id")}}'>{{__('main.back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
@endsection