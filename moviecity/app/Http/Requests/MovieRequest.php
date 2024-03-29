<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MovieRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:3',
			'description' => 'required|min:5',
			'actors' => 'required',
			'director' => 'required',
			'release' => 'required|date',
			'rating' => 'required|in:G,PG,PG-13,R',
			'category' => 'required|in:Drama,Action,Comedy,Suspense,Horror,Western,Romance'
		];
	}

}