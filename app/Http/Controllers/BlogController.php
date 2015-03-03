<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('published_at', 'DSC')->get();
		return view('blog.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$v = Validator::make($request->all(), [
		        'title' => 'required|unique|max:255',
		        'body' => 'required',
		    ]);

	    if ($v->fails())
	    {	
	    	flash()->error('Post creation failed');
	        return redirect()->back();
	    }
				
		$posts = Post::all();

		$post = new Post($request->all());
		$post->published_at = Carbon::now();
		$post->user_id = Auth::user()->id;
		$post->slug = str_replace(' ', '-', $post->title);

		/**
		 * Deal with duplicates
		 */
		foreach($posts as $temp)
		{
			if($post->slug == $temp->slug)
			{
				$post->slug = $post->slug . '-';
			}
		}
		$post->save();
		$post->slug = $post->slug . '-' . $post->id;
		$post->save();

		flash()->success('Post created successfully');
		return redirect(url('/blog'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slog
	 * @return Response
	 */
	public function show($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();

		return view('blog.show', compact('post'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
