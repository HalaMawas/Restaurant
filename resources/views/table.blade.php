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
                    @foreach(cache('tables') as $table)
                    <div class="col-md-4">
                          <a href="{{url("category/{$table->id}")}}">
                        <div class="food-item">
                            <!-- <i class="flaticon-burger"></i> -->
                          
                            <div class="cat-img">
                                            <img src='{{asset("fronted/img/table.png")}}' alt="Image">
                                        </div>
                            <h2>{{$table->name}}</h2>
                            <!-- <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem. 
                            </p> -->
                        </div>
                    </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
@endsection