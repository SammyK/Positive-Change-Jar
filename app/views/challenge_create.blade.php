@extends('common.layout')


@section('content')
<h1>What's your vice?</h1>

<div class="clearfix">
@foreach ($challenges as $challenge)
    <div class="challenge">
        <a href="/user/challenge-add/{{ $challenge->id }}"><img src="{{ $challenge->image_url }}" width="200"></a>
        <p>{{ $challenge->name }}</p>
    </div>
@endforeach
</div>

@stop