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

    public function postSignup () {

        /*
        $team = new Team;
        $team->
        */

        $user = new User;
        $user->email_address = Input::get('email_address');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('first_name');
        $user->teams_id = 1000;


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


        $challenges = DB::select('SELECT * FROM
        users u, teams t, challenges c
        WHERE u.id = ?
        AND u.teams_id = t.id
        AND t.challenge_id = c.id
        ', array(Auth::user()->id));

        //Data for the content of the view
        $data_view = array('challenges' => $challenges);



        return View::make('mychallenges', $data_view);

    }


}

