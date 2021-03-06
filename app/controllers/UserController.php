<?php

class UserController extends BaseController {


    public function listUsers()
    {

        $Users = User::all();


        //Data for the content of the view
        $data_view = array('users' => $Users);


        return View::make('listusers',$data_view);

    }


    public function indexSignup () {

        return View::make('signup');

    }

    public function addChallenge($id) {
        $team = User::find(Auth::user()->id)->team()->get();

        $team = Team::find($team[0]->id);
        $team->challenge_id = $id;
        $team->save();

        Session::put('added_challenge', true);

        return Redirect::to('user/challenges');
    }

    function createChallenge() {

        // Does this user already have a challenge?
        //$mine = Challenge::where('user_id', Auth::user()->id)->get();
        if( Session::has('added_challenge') )
        {
            return Redirect::to('user/challenges');
        }

        $challenges = Challenge::all();
        $data_view = array('challenges' => $challenges);

        return View::make('challenge_create', $data_view);
    }

    public function postSignup () {

        /*
        $team = new Team;
        $team->
        */

        $user = new User;
        $user->email_address = Input::get('email_address');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('first_name');
        $user->team_id = 1000;


        //Uses the validation that is in the model
        if ( ! $user->save() )
        {

            return Redirect::route('signup')
                ->with('flash_error', 'Error');

        }

        Auth::loginUsingId($user->id);

        return Redirect::route('IndexPage')
            ->with('flash_notice', 'You are now a member');

    }


    public function myChallenges()
    {
        // Have they added a challenge?
        if( ! Session::has('added_challenge') )
        {
            return Redirect::to('user/challenge-create');
        }

        $challenges = DB::select('SELECT * FROM
        users u, teams t, challenges c
        WHERE u.id = ?
        AND u.team_id = t.id
        AND t.challenge_id = c.id', array(Auth::user()->id));

        //Data for the content of the view
        $data_view = array('challenges' => $challenges);







        return View::make('mychallenges', $data_view);

    }


    public function myFailures()
    {



        $failures = DB::select('SELECT  c.name, c.description, fc.created_at, t.penalty_per_misses FROM
        users u, challenges c, user_fails_challenges fc, teams t
        WHERE u.id = ?
        AND u.team_id = t.id
        AND fc.user_id = u.id
        AND fc.challenge_id = c.id

        ', array(Auth::user()->id));

        //Data for the content of the view
        $data_view = array('failures' => $failures, 'sum' => 0);



        return View::make('myfailures', $data_view);

    }

}

