<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $articles = Article::all();
        return view('dashboard', ['articles'=>$articles]);
    }
}
