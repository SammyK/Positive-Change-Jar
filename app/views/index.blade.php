@extends('common.layout')


@section('content')

<BR><BR>


<h2>Home Page</h2>

<!-- <a href="{{ route('UsersList') }}">Users List</a> -->

@if(Session::has('message'))
{{ Session::get('message')}}
@endif
<br>

@if (!empty($data))
Hello, {{{ $data['first_name'] }}}
<img src="https://graph.facebook.com/{{ $data['id']}}/picture?type=large'">
<br>
Your email is {{ $data['email_address']}}
<br>
<a href="logout">Logout</a>
@else
Hi! Would you like to <a href="login/fb">Login with Facebook</a>?
@endif


@stop