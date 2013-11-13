@extends('common.layout')


@section('content')

<BR><BR>



<h3>My challenges</h3>

@foreach ($challenges as $challenge)

<li><b>{{$challenge->name }}</b> ({{ $challenge->description }})<BR>Penalty: U$ {{ $challenge->penalty_per_misses }}
    {{ Form::open(array('route' => 'postFailure')) }}

    {{ Form::hidden('user', Auth::user()->id) }}
    {{ Form::hidden('challenge', $challenge->id) }}

    <!-- submit button -->
    <p>{{ Form::submit('Ops, I did it again', array('class' => 'btn btn-success btn-lg')) }}</p>

    {{ Form::close() }}
</li>

@endforeach

@stop