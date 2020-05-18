@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Rate this seller: {{$sellername}} </h3></header>
				<h3>His overall score now is <sc>{{$average}}</sc></h3>
                <form enctype="multipart/form-data" action="{{route('rate.create',['user_id' => $user_id])}}" method="post">
                    <div class="form-group">
                        <lable for="comments">comments:</lable>
                        <input class="form-control" type="text" name="comments" id="comments" >
						<lable for="score">score(1-10):</lable>
						<input class="form-control" type="number" name="score" id="score" >
                    </div>
                    <button type="submit" class="btn btn-primary">Rate Him</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
    </section>
    <section class="row posts">
         <div style="text-align:center" class="col-md-6">
    <br><br><button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('mainboard')}}'">GO BACK</button><br><br>
    	</div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Related comment:</h3></header>
				@foreach($rates as $rate)
                <article class="rate">
                    <div class="comment">
                        {{$rate->comment}}
                    </div>
					<div class="score">
                        I rate it {{$rate->score}} out of 10 
                    </div>
                    <div class="info">
                        Posted at {{$rate->created_at}}
                    </div>
                </article>
                @endforeach
               
        </div>
    </section>
@endsection