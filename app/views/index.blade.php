@extends('common.layout')


@section('content')

<BR><BR>


<h2>Home Page</h2>


<h3>Last challenges posted</h3>

@foreach ($challenges as $challenge)
<p>
    <li><b>{{$challenge->name }}</b> ({{ $challenge->description }})<BR>Penalty: U$ {{ $challenge->penalty_per_misses }}</li>
</p>
@endforeach

<h3>Links</h3>

<li><a href="{{ route('UsersList') }}">Users List</a></li>

@stop