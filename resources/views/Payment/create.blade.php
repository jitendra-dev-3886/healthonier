<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Make Payment</h1>
    <button id="rzp-button">Pay Now</button>

    <script>
        var options = {
            key: '{{ env('
            RAZORPAY_KEY ') }}'
            , amount: 500, // replace with your actual order amount
            currency: 'INR', // replace with your currency code
            name: 'Your Company Name'
            , description: 'Payment for Order'
            , order_id: '{{ $orderId }}'
            , handler: function(response) {
                alert('Payment success');
                // Handle success callback
            }
            , prefill: {
                name: 'John Doe'
                , email: 'john@example.com'
                , contact: '9876543210'
            }
        };

        var rzp = new Razorpay(options);

        document.getElementById('rzp-button').onclick = function(e) {
            rzp.open();
        };

    </script>
</body>
</html>
