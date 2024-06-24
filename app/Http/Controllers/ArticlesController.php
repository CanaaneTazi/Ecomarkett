<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Article;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Article::all();
        return view('articles.view', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = categorie::all();
        return view('articles.index', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'prix' => 'required', 'numeric',
            'remise' => 'required', 'numeric',
            'vendable' => 'required', 'boolean',
            'marque' => 'required', 'string', 'max:30',
            'materiaux' => 'required', 'string', 'max:50',
            'provenance' => 'required', 'string', 'max:50',
            'image' => 'required', 'image',
        ]);
        
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
        }
        

        $article = new Article();
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->remise = $request->remise;
        $article->stock = $request->stock;
        $article->vendable = $request->vendable;
        $article->marque = $request->marque;
        $article->materiaux = $request->materiaux;
        $article->provenance = $request->provenance;
        $article->image = $imagePath;
        $article->categorie_id = $request->categories;


        $article->save();
        
 
        return redirect('/articles')->with('status', 'Article ajouté');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.details', compact('article'));
    }

    public function search(Request $request){
        dd($request);
        $articles = Article::findBySearch($request->search);
        return view('dashboard', compact('articles'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = $imagePath;
            $article->image = $imagePath;
        }

        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->prix = $request->prix;
        $article->remise = $request->remise;
        $article->stock = $request->stock;
        $article->vendable = $request->vendable;
        $article->marque = $request->marque;

        $article->save();

        return redirect('/articles')->with('status', 'Article modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès !');
    }
}
