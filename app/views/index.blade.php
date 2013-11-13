@extends('common.layout')


@section('content')

<BR><BR>



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
Hi! Would you like to <a class="btn btn-large btn-primary" href="login/fb">Login with Facebook</a>?
@endif

<h3>Last challenges posted</h3>
<?
/*
@foreach ($challenges as $challenge)
<p>
    <li><b>{{$challenge->name }}</b> ({{ $challenge->description }})<BR>Penalty: U$ {{ $challenge->penalty_per_misses }}</li>
</p>
@endforeach
*/
?>
<h3>Links</h3>

<li><a href="{{ route('UsersList') }}">Users List</a></li>

@stop