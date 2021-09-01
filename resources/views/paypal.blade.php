<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
  </head>

  <body>



    <ul>
        <h1>Order Deatails</h1>
        <p>order no: {{ $order->order_number }}</p>
        <p>shipping full name: {{ $order->shipping_full_name }}</p>
        <p>shipping address: {{ $order->shipping_address }}</p>
        <p>phone no: {{ $order->shipping_phone }}</p>
        <p>item count: {{ $order->item_count }}</p>
        <p>grand total: {{ $order->grand_total }}</p>
        <input type="hidden" id="amount" value="{{ $order->grand_total }}">
    </ul>


    <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZ5GIZMSmzIceaODw1w130l3GqaG1iAwno4O_bcuQYrDm8Jc0TJr5yvGnJaXk5zUNCne2hvpZLtADy0o&currency=USD"></script>




    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: document.getElementById('amount').value,
                // value: '55.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');

    </script>
  </body>
</html>