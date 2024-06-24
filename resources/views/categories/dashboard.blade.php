<x-app-layout>
    <div class="max-w-2xl ml-3 p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        
        <table>
        <caption class="text-2xl font-bold mb-6">Les Catégories</caption>
            <thead>
                <th>#</th>
                <th>Titre</th>
                <th>Remise</th>
                <th>Cumulable</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data as $categorie)
                <tr>
                    <td class="py-2 px-4">{{$categorie->id}}</td>
                    <td class="py-2 px-4">{{$categorie->titre}}</td>
                    <td class="py-2 px-4">{{$categorie->remise}}</td>
                    <td class="py-2 px-4">{{$categorie->cumulable}}</td>
                    <td>
                        <form action="categories/{{$categorie->id}}/edit" method="POST" class="inline-block">
                            @csrf
                            @method('GET')
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </button>
                        </form>
                        <form action="categories/{{$categorie->id}}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?');">
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
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{  url('categories/create') }}">
            Ajouter une catégorie
        </a>
</x-app-layout>