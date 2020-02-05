<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{//
	public function store()
	{
		
		$author = Author::create($this->validateRequest());

		return redirect($author->path());
	}

	public function update(Author $author)
	{
		
		$author->update($this->validateRequest());
		
		return redirect($author->path());
	}

	public function destroy(Author $author)
	{
		$author->delete();
		
		return redirect('/authors'); 
	}

	protected function validateRequest()
	{
		return request()->validate([
			'name' => 'required',
			'dob' => 'required'
		]);
	}
}
