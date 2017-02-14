@extends ('layouts.master')
@section ('title')
Welcome
@endsection

@section ('content')
@if(count($errors)>0)
<div class="row">
    <div class="col-md-8">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            
            @endforeach
        </ul>
    </div>
</div>

@endif
<div class="row">
    <div class="col-md-6">
        <h3>Sign up</h3>
        <form action="{{route('signup')}}" method="post">
            <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                <label for="email">Your email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
            </div>
            <div class="form-group {{$errors->has('first_name') ? 'has-error':''}}">
                <label for="first_name">Your name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                <label for="password">Your password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
        <div class="col-md-6">
            <h3>Sign in</h3>
        <form action="{{route('signin')}}" method="post">
            {{csrf_field()}}
                
            <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                <label for="email">Your email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error':''}}">
                <label for="password">Your password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
<!--            <input type="hidden" name="_token" value="{{Session::token()}}">-->
        </form>
    </div>
</div>
@endsection