<x-app-layout>

<form action="/checkout" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit">Checkout</button>
</form>
</x-app-layout>