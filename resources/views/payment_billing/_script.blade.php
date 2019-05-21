{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      name: {
        required: true
      }
    };

    var messages = {
      name: {
        required: "Please enter Billing Type"
      }
    };

    $("#payment-billingval").validate({
      rules: rules,
      messages: messages
    });

    $("#editPaymentBillingForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>