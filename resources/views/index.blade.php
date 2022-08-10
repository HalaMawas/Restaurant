@extends('master')
@section('style')
<style>
.cat-img{
    width: 100%;
    text-align: center;
}
.cat-img img {
    height: 100px;
    border-radius: 15px;
    text-align: center;
}
</style>
@endsection
@section('content')
<div class="food mt-0">
            <div class="container">
                <div class="row align-items-center">
                    @foreach(cache('categoriesvar') as $category)
                    <div class="col-md-4">
                        <div class="food-item">
                            <!-- <i class="flaticon-burger"></i> -->
                            <div class="cat-img">
                                            <img src='{{url("category_image/{$category->image}")}}' alt="Image">
                                        </div>
                            <h2>{{$category->{'name_'.LaravelLocalization::getCurrentLocale()} }}</h2>
                            <!-- <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem. 
                            </p> -->
                            <a href='{{url("meals/{$category->id}?table={$table}")}}'>{{ __('main.view')}}</a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
@endsection