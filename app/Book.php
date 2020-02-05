<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $guarded = [];

    public function path()
    {
    	return route('books.show', $this->id);
    }

    public function setAuthorIdAttribute($author)
    {
    	$this->attributes['author_id'] = Author::firstOrCreate([
    		'name' => $author
    	])->id;
    }
}
