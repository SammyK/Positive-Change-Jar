@extends('common.layout')


@section('content')
<h1>What's your vice?</h1>

<div class="clearfix">
@foreach ($challenges as $challenge)
    <div class="challenge" style="width:200px;height:200px">
        <a href="/user/challenge-add/{{ $challenge->id }}"><img class="challenges" src="{{ $challenge->image_url }}" style="display:block;width:130px;margin-left: auto;margin-right: auto;margin-top:10px;margin-bottom:auto;"></a>
        <br/><p style="text-align: center;clear:both">{{ $challenge->name }}</p>
    </div>
@endforeach
</div>

@stop