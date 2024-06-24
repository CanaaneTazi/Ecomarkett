<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <form id="payment-form">
        <div id="card-element"><!-- Stripe.js injecte les éléments de carte ici --></div>
        <button id="submit-button">Payer</button>
        <div id="error-message"></div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const stripe = Stripe("{{ config('services.stripe.key') }}");

            const {clientSecret} = await fetch("{{ route('payment.process') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": "{{ csrf_token() }}",
                },
            }).then((r) => r.json());

            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            const form = document.getElementById('payment-form');
            const errorMessage = document.getElementById('error-message');

            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const {paymentIntent, error} = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: cardElement,
                    }
                });

                if (error) {
                    errorMessage.textContent = error.message;
                } else {
                    if (paymentIntent.status === 'succeeded') {
                        errorMessage.textContent = 'Payment successful!';
                    }
                }
            });
        });
    </script>
</body>
</html>
