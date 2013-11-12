@extends('common.layout')


@section('content')

<BR><BR>


<h2>User Login Page</h2>


    {{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}



    <input name=email_address type="text" class="form-control" placeholder="Email" autofocus="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>

    <BR><BR>

    Not a member? <a href="{{ route('signup') }}" class='btn btn-success'>Sign up</a>


{{ Form::close() }}

@stop