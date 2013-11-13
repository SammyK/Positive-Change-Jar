<?php

class FailureController extends BaseController {


    public function postFailure()
    {

        DB::insert('INSERT into user_fails_challenges
                              (user_id, challenge_id, created_at)
                              VALUES (?,?,\'2013-12-12 20:00:00\')
        ', array(Input::get('user'),Input::get('challenge')));

        return Redirect::route('myfailures')
            ->with('flash_error', 'Thank you, you just make a donation!');


    }



}
