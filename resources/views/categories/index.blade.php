<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <form method="POST" action="{{ url('/categorie/store') }}" enctype="multipart/form-data">
            @csrf

        <!-- Titre -->
        <div>
            <x-input-label for="titre" :value="__('Titre :')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="old('titre')" required autofocus autocomplete="titre" />
            <x-input-error :messages="$errors->get('titre')" class="mt-2" />
        </div>

        <!-- Remise -->
        <div>
            <x-input-label for="remise" :value="__('Remise :')" />
            <x-text-input id="remise" class="block mt-1 w-full" type="text" name="remise" maxlength="2" :value="old('remise')" required autofocus autocomplete="remise" />
            <x-input-error :messages="$errors->get('remise')" class="mt-2" />
        </div>

        <!-- Cumulable -->
        <div style="display: flex; padding-top: 10px;">
            <x-input-label  value="Cumulable :" /> &nbsp;
            <div style="display: flex;">
                <x-input-label for="true" value="Oui" />&nbsp;
                <input type="radio"  id="true" name="cumulable" value= 1 />&nbsp;
            </div>
            <div style="display: flex;">
                <x-input-label for="false" value="Non" />&nbsp;
                <input type="radio"  id="false" name="cumulable" value= 0 />
            </div>
            <x-input-error :messages="$errors->get('Cumulable')" class="mt-2" />
        </div>

        @method('POST')
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">Créer la catégorie</x-primary-button>
        </form>
    </div>
</x-app-layout>