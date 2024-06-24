<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenue sur EcoMarket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6">Liste des articles</h1>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($articles as $article)
                                <div class="border rounded-lg p-4 bg-gray-100">
                                    @if ($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover mb-4 rounded-md">
                                            <a href="/article/{{$article->id}}"><p style="text-decoration: underline;">détails de l'article</p></a>
                                        </img>
                                    @endif
                                    <h2 class="text-xl font-bold mb-2">{{ $article->titre }}</h2>
                                    <p>{{$article->prix}}€</p>
                                    <p class="text-gray-700">{{ $article->description }}</p>
                                    <form method="POST" action="{{route('cart.add')}}">  
                                        @csrf
                                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                                            Ajouter au panier
                                        </button>
                                        <input type="hidden" name="id" value="{{$article->id}}">
                                        <input type="hidden" name="titre" value="{{$article->titre}}">  
                                        <input type="hidden" name="prix" value="{{$article->prix}}">                                               
                                        <input type="hidden" name="quantity" id="qty" value="1">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
