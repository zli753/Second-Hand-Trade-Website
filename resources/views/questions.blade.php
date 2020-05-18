@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Ask questions about this good: </h3></header>
                <form enctype="multipart/form-data" action="{{route('question.create',['good_id' => $good_id])}}" method="post">
                    <div class="form-group">
                        <lable for="questions">questions:</lable>
                        <input class="form-control" type="text" name="questions" id="questions" >
                    </div>
                    <button type="submit" class="btn btn-primary">Ask</button>
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
            <header><h3>Related questions:</h3></header>
                @foreach($questions as $question)
                <article class="question">
                    <div class="question">
                        {{$question->question}}
                    </div>
                    <div class="info">
                        Posted at {{$question->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="{{route('question.edit',['question_id' => $question->id, 'good_id' => $good_id])}}">Edit</a> |
                        <a href="{{route('question.delete',['question_id' => $question->id, 'good_id' => $good_id])}}">Delete</a>                    
                    </div>
                </article>
                @endforeach
        </div>
    </section>
@endsection