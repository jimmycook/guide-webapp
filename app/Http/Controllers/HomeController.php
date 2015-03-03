<?php namespace App\Http\Controllers;

use App\Food;
use App\Post;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DSC')->limit(3)->get();
		$food = Food::orderBy(\DB::raw('RAND()'))->first();
		return view('home', compact('posts', 'food'));
	}

	public function location()
	{
		return view('location');
	}

}
