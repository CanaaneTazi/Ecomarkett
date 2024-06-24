<x-app-layout>
    <div class="max-w-2xl ml-3 p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
    </div>

    <?php $Total = 0.00; ?>
    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Image</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)   
                            <?php $Total = $Total + $product->subtotal(); ?>                                                
                            <tr>
                                <td>
                                    <a href="">
                                        <img src= "{{$product->image}}" class="blur-up lazyloaded" alt="{{$product->name}}">
                                    </a>
                                </td>
                                <td>
                                    <a href="/articles">{{$product->name}}</a>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{{$product->price}}€</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" data-rowid="{{$product->rowId}}" class="form-control input-number" value="{{$product->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">{{$product->subtotal()}}€</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeItemFromCart('{{$product->rowId}}')">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article de votre panier ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>                       
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="{{Cart::instance('cart')->destroy()}}" class="text-decoration-underline theme-color d-block text-capitalize">Vider le panier</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{url('/')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continuer mon shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4"> <br>
                        <span>
                            Total : {{ $Total }} €
                        </span>
                        <form action='/paiement' method='post'>
                            @csrf
                            <button type="submit">Procéder au paiement</a></button>
                        </form>
                    </div>
                </div>
            </div>               
        </div>
    </section>
</x-app-layout>