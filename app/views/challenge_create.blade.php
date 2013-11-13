@extends('common.layout')


@section('content')
<h1>What's your vice?</h1>

<div class="clearfix">
@foreach ($challenges as $challenge)
    <div class="challenge">{{ $challenge->name }}</div>
@endforeach
</div>

@stop