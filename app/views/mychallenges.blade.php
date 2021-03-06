@extends('common.layout')


@section('content')

<h3>My challenges</h3>

@foreach ($challenges as $challenge)

<img class="span2 challenges" style="width:100px" src="{{$challenge->image_url }}">
<b>{{$challenge->name }}</b> ({{ $challenge->description }})
    {{ Form::open(array('route' => 'postFailure')) }}

    {{ Form::hidden('user', Auth::user()->id) }}
    {{ Form::hidden('challenge', $challenge->id) }}

    <!-- submit button -->
    {{ Form::submit('Oops, I did it again - Penalty: $' . $challenge->penalty_per_misses , array('class' => 'btn btn-success btn-lg')) }}</p>

    {{ Form::close() }}

    <?php
    $world_sum_sql = DB::select('select sum(t.penalty_per_misses) as total
                               from user_fails_challenges fc, teams t, users u
                               where t.challenge_id = fc.challenge_id

                               AND u.team_id = t.id
                               AND u.id = fc.user_id
                               AND fc.challenge_id = ?'
                               , array($challenge->id));


    $world_total = $world_sum_sql[0]->total;

    $user_sum_sql = DB::select('select count(t.penalty_per_misses) as total
                               from teams t, user_fails_challenges fc, users u
                               where t.challenge_id = fc.challenge_id
                               AND u.team_id = t.id
                               AND u.id = fc.user_id
                               AND fc.challenge_id = ?
                               AND fc.user_id = ?'
        , array($challenge->id, Auth::user()->id));


    $user_total = $user_sum_sql[0]->total;

    ?>


    <i class="icon-thumbs-up"></i> Because of this challenge, you have already donated ${{ $user_total }}<BR>
    <i class="icon-globe"></i>This challenge has already helped to raise ${{ $world_total }} from all around the world.
</li>
<hr>

@endforeach

@stop