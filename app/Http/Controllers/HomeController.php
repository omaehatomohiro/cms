<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleType;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articleTypes = ArticleType::all();
        return view('home')->with('articleTypes',$articleTypes);
    }
}
