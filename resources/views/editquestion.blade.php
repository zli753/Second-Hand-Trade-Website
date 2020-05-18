@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Edit this question: </h3></header>
                <form enctype="multipart/form-data" action="{{route('question.editquestionAction',['question_id' => $questions->id,'good_id' => $good_id])}}" method="post">
                    <div class="form-group">
                        <lable for="questions">questions:</lable>
                        <input class="form-control" type="text" name="questions" id="questions" value="{{$questions->question}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
    </section>
@endsection