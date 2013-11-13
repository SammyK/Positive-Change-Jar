@extends('common.layout')


@section('content')

<p>Positive Jar is an app that let's your turn your bad habits into good deeds.
    Every time you swear or don't work out eat cake, add some money to the jar.
    All that change adds up to change a real-world problem. Cancer Research UK
    receives the money from the jar and 100% of that money goes into defeating cancer.</p>

@if(Auth::check())
<p><a class="btn btn-large btn-success" href="{{ route('mychallenges') }}">Go to My Jar</a></p>
@else
<p><a class="btn btn-large btn-primary" href="login/fb">Create a Jar with my Facebook</a></p>
@endif

<!--
<h3>Last challenges posted</h3> -->
<?
/*
@foreach ($challenges as $challenge)
<p>
    <li><b>{{$challenge->name }}</b> ({{ $challenge->description }})<BR>Penalty: U$ {{ $challenge->penalty_per_misses }}</li>
</p>
@endforeach
*/
?>
@stop