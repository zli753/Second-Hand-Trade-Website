@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
        <header><h7>View by category:</h7></header>
         <br><button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('getFurniture')}}'">furniture</button>
           <button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('getElectronics')}}'">electronics</button>
           <button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('getBook')}}'">book</button>
           <button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('getOther')}}'">other</button>
           <button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('mainboard')}}'">all</button><br><br><br>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
        <header><h7>Search goods:</h7></header>
            <form enctype="multipart/form-data" action="{{route('good.search')}}" method="post">
                    <div class="form-group">
                        <lable for="search">Search:</lable>
                        <input class="form-control" type="text" name="search" id="search" >
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What you can buy</h3></header>
                @foreach($Goods as $Good)
                <article class="good">
                    <div class="goodtitle">
                        {{$Good->goodname}}
                    </div>
                    <p>{{$Good->description}}</p>
                    <div class="info">
                        Posted by {{$Good->users->username}}
                    </div>
                    <div class="selleraddress">
                        {{$Good->address}}
                    </div>
                    <div class="sellercontact">
                        {{$Good->contact}}
                    </div>
                    <div class="sellercate">
                        {{$Good->cate}}
                    </div>
                    <div class="interaction">                    
                        <a href="{{route('question.getquestions',['good_id' => $Good->id])}}">Question</a> |
                        <a href="{{route('good.map',['good_address' => $Good->address])}}">View on map</a> |
                        @if(Auth::user())
                        <a href="{{route('rate.getrates',['good_userid' => $Good->users_id])}}">RateSeller</a> |
                    @endif
                        @if(Auth::user()==$Good->users)
                        <a href="{{route('good.edit',['good_id' => $Good->id])}}">Edit</a> |
                        <a href="{{route('good.delete',['good_id' => $Good->id])}}">Delete</a>                    
                    </div>
                    @endif
                    <div class="sellerpicture">
                        <img src="http://ec2-52-32-113-58.us-west-2.compute.amazonaws.com:8000/{{$Good->picture}}" alt="" />
                    </div>
                </article>
                @endforeach
        </div>
    </section>
@endsection