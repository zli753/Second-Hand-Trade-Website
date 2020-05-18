@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>edit your goods:</h3></header>
                <form enctype="multipart/form-data" action="{{route('good.editAction',['good_id' => $Goods->id])}}" method="post">
                    <div class="form-group">
                        <lable for="goodname">Good name</lable>
                        <input class="form-control" type="text" name="goodname" id="goodname" value="{{$Goods->goodname}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-group" name="description" id="description" rows="5" placeholder="{{$Goods->description}}"></textarea>             
                    </div>
                    <div class="form-group">
                        <lable for="address">Address</lable>
                        <input class="form-control" type="text" name="address" id="address" value="{{$Goods->address}}">
                    </div>
                    <div class="form-group">
                        <lable for="contact">Contact</lable>
                        <input class="form-control" type="text" name="contact" id="contact" value="{{$Goods->contact}}">
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
                    <button type="submit" class="btn btn-primary">Edit your good</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
    </section>
@endsection