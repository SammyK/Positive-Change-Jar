<?php

class AuthController extends BaseController  {



    public function indexLogin () {


        return View::make('signin');

    }

    public function postLogin () {

        $user = array(
            'email_address' => Input::get('email_address')
        );

        if (Auth::attempt($user)) {

// If user attempted to access specific URL before logging in
            if ( Session::has('pre_login_url') )
            {
                $url = Session::get('pre_login_url');
                Session::forget('pre_login_url');
                return Redirect::to($url);
            }
            else
                return Redirect::route('IndexPage')
                    ->with('flash_notice', 'You are successfully logged in.');
        } else {


// authentication failure! lets go back to the login page
            return Redirect::route('login')
                ->with('flash_error', 'Your username/password combination was incorrect.')
                ->withInput();

        }


}



public function logout () {

Auth::logout();

return Redirect::route('home')
->with('flash_notice', 'You are successfully logged out.');
}


}