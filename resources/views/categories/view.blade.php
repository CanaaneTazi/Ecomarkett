<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6">Liste des Catégorie</h1>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($categories as $categorie)
                                <div class="border rounded-lg p-4 bg-gray-100">
                                    <img class="w-3x1 h-48 object-cover mb-4 rounded-md" src="{{ asset('img/logo.png') }}" alt="Article">
                                    <h2 class="text-xl font-bold mb-2">{{ $categorie->titre }}</h2>
                                    <p>Remise : {{$categorie->remise}}%</p>
                                    <p class="text-gray-700">{{ $categorie->cumulable }}</p>
                                    <button onclick="window.location.href='/categorie/{{$categorie->id}}'" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Voir tous les articles de cette catégorie</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
