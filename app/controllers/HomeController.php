<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		return View::make('hello');
	}



    public function indexPage()
    {


        $challenges = DB::select('SELECT * FROM challenges');

        //Data for the content of the view
        $data_view = array('challenges' => $challenges);



        return View::make('index', $data_view);

    }

}