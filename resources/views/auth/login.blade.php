
@extends('layout');

@section('content')

    <h2>Signin</h2>



    <form action="login_check" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">

            @if($errors->has('email')) <p> {{$errors->first('email')}}</p>@endif
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            @if($errors->has('password')) <p> {{$errors->first('password')}}</p>@endif
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
{{--        <a href="{{route('auth.forget')}}">Forget password</a>--}}
    </form>


@endsection































