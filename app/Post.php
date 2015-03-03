<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model {

	protected $fillable = [
		'title', 
		'slug', 
		'body',
		'published_at'];

	protected $dates = ['published_at'];

	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	/**
	 * A post is created by a user
	 * @return \HasOne
	 */
	public function user()
	{
		return $this->belongsTo("App\User");
	}
}
