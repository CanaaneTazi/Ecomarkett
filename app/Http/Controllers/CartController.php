<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('panier.cart');
    }

    public function add(Request $request) 
    {
        $article = Article::findOrFail($request->id);

        $id = $request->id;
        $name = $request->titre;
        $quantity = $request->quantity;
        $price = $request->prix;

        Cart::add($id, $name, $quantity, $price);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }
    
    public function update(Request $request, $rowId){
        Cart::update($rowId, ['quantity'  => $request]);  
        return back();
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    public function destroy(){
        Cart::destroy();
        return back();
    }


}
