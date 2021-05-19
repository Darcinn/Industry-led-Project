<div id="paypal-button-container">
  <script src="https://www.paypal.com/sdk/js?client-id=AcBQaqzIPTsCmX5vEbPzCN0NUM9QduuDoNmWrbYTRtTze59fxAxtVKNOImYXJ-2U6VTUty4xOb_4LM8e&currency=GBP" data-sdk-integration-source="button-factory"></script>
  <script>
    function paid() {
      location.replace("payment_success.php");
    }

    paypal.Buttons({
        style: {
          color: "silver",
          shape: "pill",
        },
        createOrder: function(data, actions) {
          // Set up the transaction
          return actions.order.create({
            purchase_units: [{
              amount: {
                currency_code: "GBP",
                value: "99",
              },
              description: "Webflix Premium",
              custom_id: "4206969",
            }, ],
          });
        },
        onApprove: function(data, actions) {
          // Capture order after payment approved
          return actions.order.capture().then(function(details) {
            paid();
          });
        },
        onError: function(err) {
          errorText = err;
          error = true;
        },
      })
      .render("#paypal-button-container"); // Renders the PayPal button
  </script>


</div>