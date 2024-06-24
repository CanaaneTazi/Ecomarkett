<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Partie Utilisateur de l'affichage des catégories
     */
    public function __invoke(Request $request)
    {
        $categories = categorie::all();
        return view('categories.view', ['categories'=>$categories]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = categorie::all();
        return view('categories.dashboard', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categorie = categorie::all();
        return view('categories.index', ['categories'=>$categorie]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:25',
            'remise' => 'required', 'numeric',
            'cumulable' => 'required', 'boolean',
        ]);
        
        $categorie = new categorie();
        $categorie->titre = $request->titre;
        $categorie->remise = $request->remise;
        $categorie->estCumulable = $request->cumulable;


        $categorie->save();
        
 
        return redirect('/categories')->with('status', 'Catégorie ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie = categorie::findOrFail($id);
        $articles = Article::findByCategorieOrFail($id);
        return view('categories.dashByCategorie', ['articles'=>$articles, 'categorie'=>$categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $catgorie = categorie::findOrFail($id);

        $catgorie->titre = $request->titre;
        $catgorie->remise = $request->remise;
        $catgorie->cumlable = $request->cumlable;

        $catgorie->save();

        return redirect('/categories')->with('status', 'Catégorie modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = categorie::findOrFail($id);
        $categorie->delete();
        return redirect('/categories')->with('success', 'Cateégorie supprimé avec succès !');
    }
}
