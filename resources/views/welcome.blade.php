@extends('layouts.master')
@section('title')
    welcome
@endsection

@section('content')
   @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
        <h3>Sign Up</h3>
            <form action="{{route('signup')}}" method="post">
                <div class="form-group {{ $errors->has('username') ? 'has-error':''}}">
                    <lable for="username">Your Username</lable>
                    <input class="form-control" type="text" name="username" id="username" value="{{Request::old('username')}}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                    <lable for="password">Your Password</lable>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group {{ $errors->has('username') ? 'has-error':''}}">
                    <lable for="username">Your Username</lable>
                    <input class="form-control" type="text" name="username" id="username" value="{{Request::old('username')}}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error':''}}">
                    <lable for="password">Your Password</lable>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
    <div style="text-align:center" class="col-md-6">
    <br><br><button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('mainboard')}}'">EXPLORE THE CURRENT GOODS</button>
    </div>
@endsection