<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <form method="post" action="{{ url('articles/'.$article->id.'') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

        <!-- Titre -->
        <div>
            <x-input-label for="titre" :value="__('Titre :')" />
            <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre', $article->titre)" placeholder="Titre de l'article" required autofocus autocomplete="titre" />
            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description :')" />
            <textarea name="description" placeholder="Description de l'article" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{$article->titre}}</textarea>
        </div>

        <!-- Prix -->
        <div>
            <x-input-label for="prix" :value="__('Prix :')" />
            <x-text-input id="prix" class="block mt-1 w-full" type="text" name="prix" maxlength="4" :value="old('prix', $article->prix)" placeholder="Prix de l'article" required autofocus autocomplete="prix" />
            <x-input-error :messages="$errors->get('prix')" class="mt-2" />
        </div>

        <!-- Remise -->
        <div>
            <x-input-label for="remise" :value="__('Remise :')" />
            <x-text-input id="remise" class="block mt-1 w-full" type="text" name="remise" maxlength="2" :value="old('remise', $article->remise)" placeholder="Remise sur l'article" required autofocus autocomplete="remise" />
            <x-input-error :messages="$errors->get('remise')" class="mt-2" />
        </div>

        <!-- Stock -->
        <div>
            <x-input-label for="stock" :value="__('Stock :')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="text" name="stock" maxlength="4" :value="old('stock', $article->stock)" placeholder="Stock de l'article" required autofocus autocomplete="stock" />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- Vendable -->
        <div style="display: flex; padding-top: 10px;">
            <x-input-label  value="Vendable :" /> &nbsp;
            <div style="display: flex;">
                <x-input-label for="true" value="Oui" />&nbsp;
                <input type="radio"  id="true" name="vendable" value= 1 />&nbsp;
            </div>
            <div style="display: flex;">
                <x-input-label for="false" value="Non" />&nbsp;
                <input type="radio"  id="false" name="vendable" value= 0 />
            </div>
            <x-input-error :messages="$errors->get('vendable')" class="mt-2" />
        </div>

        <!-- Marque -->
        <div>
            <x-input-label for="marque" :value="__('Marque :')" />
            <x-text-input id="marque" class="block mt-1 w-full" type="text" name="marque" :value="old('marque', $article->marque )" placeholder="Marque de l'article" required autofocus autocomplete="marque" />
            <x-input-error :messages="$errors->get('marque')" class="mt-2" />
        </div>
        <br>
        <!-- Image -->
        <div>
            <img src="{{$article->getImageUrl()}}" alt="Article">
            <x-input-label for="image" value = "Image">
            <input name="image" class= "form-control" type="file">
        </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">Modifier l'article</x-primary-button>
        </form>
    </div>
</x-app-layout>