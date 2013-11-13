@extends('common.layout')


@section('content')

<BR><BR>



<h3>My challenges</h3>

@foreach ($challenges as $challenge)
<p>
<li><b>{{$challenge->name }}</b> ({{ $challenge->description }})<BR>Penalty: U$ {{ $challenge->penalty_per_misses }}</li>
</p>
@endforeach

@stop