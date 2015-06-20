<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about(){
		$name = 'Ilia <span style="color: red;">Benson</span>';
		$games = [
			'Doom', 'quake', 'Rage'
		];

		// $games = [];

		return view('pages.about', compact('name', 'games'));
	}

	public function contact(){
		return view('pages.contact');
	}

}
