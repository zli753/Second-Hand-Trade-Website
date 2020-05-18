@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you want to sell</h3></header>
                <form enctype="multipart/form-data" action="{{route('good.create')}}" method="post">
                    <div class="form-group">
                        <lable for="goodname">Good name</lable>
                        <input class="form-control" type="text" name="goodname" id="goodname" >
                    </div>
                    <div class="form-group">
                        <textarea class="form-group" name="description" id="description" rows="5" placeholder="description"></textarea>             
                    </div>
                    <div class="form-group">
                        <lable for="address">Address</lable>
                        <input class="form-control" type="text" name="address" id="address" >
                    </div>
                    <div class="form-group">
                        <lable for="contact">Contact</lable>
                        <input class="form-control" type="text" name="contact" id="contact" >
                    </div>
                    <div class="form-group">
                        <lable for="cate">Category</lable>
                        <select class="form-control" name="cate" id="cate">
                        <option>furniture</option>
                        <option>electronics</option>
                        <option>book</option>
                        <option>other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable for="picture">Picture</lable>
                        <input class="form-control" type="file" name="picture" id="picture" >
                    </div>    
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
    </section>
    <section class="row posts">
         <div style="text-align:center" class="col-md-6">
    <br><br><button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('mainboard')}}'">EXPLORE THE CURRENT GOODS</button>
    	</div>
    </section>
@endsection