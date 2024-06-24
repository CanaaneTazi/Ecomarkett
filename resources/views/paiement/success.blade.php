<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-green-600">Merci pour votre achat !</h2>
                <p class="mt-4 text-lg">Votre paiement a été traité avec succès.</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Nous avons bien reçu votre commande et nous la traitons actuellement.</p>
                
                <div class="mt-6">
                    <h3 class="text-xl font-semibold">Détails de la commande</h3>
                    <ul class="mt-4">
                        @foreach (Cart::content() as $item)
                        <li class="mt-2">
                            <strong>{{ $item->name }}</strong><br>
                            <span>{{ $item->qty }} x {{ number_format($item->price, 2) }} €</span><br>
                            <span>Total: {{ number_format($item->qty * $item->price, 2) }} €</span>
                        </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 font-semibold">Total de la commande: {{ Cart::total() }} €</p>
                </div>
                
                <a href="{{ route('dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</x-app-layout>
