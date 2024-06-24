<x-app-layout>
    <div class="max-w-2xl ml-3 p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        
        <table>
        <caption class="text-2xl font-bold mb-6">Les articles</caption>
            <thead>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Remise</th>
                <th>Prix Remise</th>
                <th>Stock</th>
                <th>Vendable</th>
                <th>Marque</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($data as $article)
                <tr>
                    <td class="py-2 px-4">{{$article->id}}</td>
                    <td class="py-2 px-4">{{$article->titre}}</td>
                    <td class="py-2 px-4">{{$article->description}}</td>
                    <td class="py-2 px-4">{{$article->prix}}€</td>
                    <td class="py-2 px-4">{{$article->remise}}%</td>
                    <td class="py-2 px-4">{{$article->remise}}%</td>
                    <td class="py-2 px-4">{{$article->stock}}</td>
                    <td class="py-2 px-4">{{$article->vendable}}</td>
                    <td class="py-2 px-4">{{$article->marque}}</td>
                    <td class="py-2 px-4">{{$article->categorie_id}}</td>
                    <td class="py-2 px-4"><img class="me-3 avatar-sm rounded-circle" src="{{$article->getImageUrl()}}" alt="Article"></td>
                    <td class="py-2 px-4" style="display: flex;">
                        <form action="articles/{{$article->id}}/edit" method="POST" class="inline-block">
                            @csrf
                            @method('GET')
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </button>
                        </form>
                        <form action="articles/{{$article->id}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?');">
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
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{  url('articles/create') }}">
            Ajouter un article
        </a>
</x-app-layout>