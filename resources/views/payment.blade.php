<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Processing</title>
</head>

<body>
    {{-- <button id="rzp-button1">Pay</button> --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
    "key": "{{ env('RAZORPAY_KEY_ID') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{ $amount }}", // Amount is in currency subunits. 
    "currency": "INR",
    "name": "Shah Brothers", //your business name
    "description": "Test Transaction",
    'handler': function(response) {
        var payid = response.razorpay_payment_id;

        fetch("{{ route('payment.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                name: "{{ $name }}",
                email: "{{ $email }}",
                phone: "{{ $phone }}",
                amount: {{ $amount / 100 }},
                payment_id: payid
            })
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                alert('Payment saved successfully');
            } else {
                alert('Failed to save payment');
            }
        })
        .catch(function() {
            alert('Error storing payment data');
        });
    },
    "image": "https://example.com/your_logo",
    "order_id": "{{ $order_id }}", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "{{ $name }}", //your customer's name
        "email": "{{ $email }}",
        "contact": "{{ $phone }}" //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.open();
    </script>
</body>

</html>