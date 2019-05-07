@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <img src="{{asset('storage/images/'.Auth::user()->avatar)}}" style="width:130px; height:130px; float:left; border-radius:50%; margin-right:25px;"  alt="Photo cannot find">
            <h2>{{$user->name}}'s profile</h2>
            <form enctype="multipart/form-data" action="profile" method="POST">
                <label for="">Update profile image</label><input type="submit" style="position: absolute;margin-left:110px; margin-top:20px;" class="btn btn-sm btn-primary">
                <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token() }}">
            <br><br>
            
            </form>
            </div>
        </div>
    </div>
</div>
@endsection