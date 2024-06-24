<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;

class test extends Controller
{
    public function search(Request $request){
        dd($request);
        $articles = Article::findBySearch($request->search);
        return view('dashboard', compact('articles'));
    }
}
