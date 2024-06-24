<x-app-layout>
    <div class="w-full sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <h1 class="text-2xl font-bold mb-6">{{$article->titre}}</h1>
        <div class="border rounded-lg p-4 bg-gray-100">
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-3x1 h-48 object-cover mb-4 rounded-md">
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
    </div>
</x-app-layout>