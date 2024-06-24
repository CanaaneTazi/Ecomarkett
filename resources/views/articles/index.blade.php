<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <form method="POST" action="{{ url('articles') }}" enctype="multipart/form-data">
            @csrf

        <!-- Titre -->
        <div>
            <x-input-label for="titre" :value="__('Titre :')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus autocomplete="titre" />
            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
        </div>

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description :')" />
            <textarea name="description" placeholder="Description de l'article" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
        </div>

        <!-- Prix -->
        <div>
            <x-input-label for="prix" :value="__('Prix :')" />
            <x-text-input id="prix" class="block mt-1 w-full" type="text" name="prix" maxlength="4" :value="old('prix')" required autofocus autocomplete="prix" />
            <x-input-error :messages="$errors->get('prix')" class="mt-2" />
        </div>

        <!-- Remise -->
        <div>
            <x-input-label for="remise" :value="__('Remise :')" />
            <x-text-input id="remise" class="block mt-1 w-full" type="text" name="remise" maxlength="2" :value="old('remise')" required autofocus autocomplete="remise" />
            <x-input-error :messages="$errors->get('remise')" class="mt-2" />
        </div>

        <!-- Stock -->
        <div>
            <x-input-label for="stock" :value="__('Stock :')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="text" name="stock" maxlength="4" :value="old('stock')" required autofocus autocomplete="stock" />
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
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- Marque -->
        <div>
            <x-input-label for="marque" :value="__('Marque :')" />
            <x-text-input id="marque" class="block mt-1 w-full" type="text" name="marque" :value="old('marque')" required autofocus autocomplete="marque" />
            <x-input-error :messages="$errors->get('marque')" class="mt-2" />
        </div>
        <br>

        <!-- Matériaux -->
        <div>
            <x-input-label for="materiaux" :value="__('Materiaux :')" />
            <x-text-input id="materiaux" class="block mt-1 w-full" type="text" name="materiaux" :value="old('materiaux')" required autofocus autocomplete="materiaux" />
            <x-input-error :messages="$errors->get('materiaux')" class="mt-2" />
        </div>
        <br>

        <!-- Provenance -->
        <div>
            <x-input-label for="provenance" :value="__('Provenance :')" />
            <x-text-input id="provenance" class="block mt-1 w-full" type="text" name="provenance" :value="old('provenance')" required autofocus autocomplete="provenance" />
            <x-input-error :messages="$errors->get('provenance')" class="mt-2" />
        </div>
        <br>

        <!-- Select -->
        <div>
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisissez une catégorie :</label>
            <select id="categories" name="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Veuillez selectionner une catégorie</option>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categories')" class="mt-2" />
        </div>
        <br>
        <!-- Image -->
        <div>
            <x-input-label for="image" value = "Image">
            <input name="image" class= "form-control" type="file">
        </div>
        @method('POST')
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">Créer l'article</x-primary-button>
        </form>
    </div>
</x-app-layout>