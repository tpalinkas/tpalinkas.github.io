<!DOCTYPE html>
<html>
   <head>

   </head>
   <body>
<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AfYF6GM_SHQyFQfYan_Ulx3KvmeGjWKeBZNUEZxq3F9Kb8glDksbGMnyfXXqFCQYVOstFVFUkk0qLsvb&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"PayPal Swag","amount":{"currency_code":"USD","value":5}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
   </body>
</html>
<?php
require 'Paypal_IPN.php';
$paypal = new Paypal_IPN('sandbox');
$paypal->run();
?>