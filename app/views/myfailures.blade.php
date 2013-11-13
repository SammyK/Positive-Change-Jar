@extends('common.layout')


@section('content')

<BR><BR>



<h3>My Failures</h3>

@foreach ($failures as $fail)
<p>
<li><b>{{$fail->name }}</b> ({{ $fail->description }})<BR>Penalty: U$ {{ $fail->penalty_per_misses }}</li>
</p>
@endforeach

@stop