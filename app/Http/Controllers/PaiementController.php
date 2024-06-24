<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\Article;
use Stripe\Checkout\Session as StripeSession;
use Gloudemans\Shoppingcart\Facades\Cart;


class PaiementController extends Controller
{

    public function index(){
        return view('paiement.index');
    }

    public function paiement(Request $request)
    {

        Stripe::setApiKey('sk_test_51PQZoCKrVr3D6oxGqtXhp3RsjwxQkOk2stO4PBBRXghWihoIPsT6NhbVYRNA5fhQipgGtc2Fz30xtyDsUizohegg004odeM8VE');

        $line_items = [];
        foreach (Cart::content() as $product) {
            $article = Article::find($product->id);
            $line_items[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->name,
                        'description' =>  $product->description],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->qty,
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('paiement.success'), 
            'cancel_url' => route('paiement.cancel'), 
            
        ]);

    return redirect()->away($session->url);
    }

    public function success()
    {
        return view('paiement.success');
    }

    public function cancel()
    {
        return view('paiement.cancel');
    }

}
