<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model {

	protected $fillable = [
		'title', 
		'slug', 
		'body',
		'published_at'];

	/**
	 * A post is created by a user
	 * @return \HasOne
	 */
	public function user()
	{
		return $this->belongsTo("App\User");
	}
}
