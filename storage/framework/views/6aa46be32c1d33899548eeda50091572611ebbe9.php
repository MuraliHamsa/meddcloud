<?php echo e(Html::script("js/jquery.validate.min.js")); ?>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      payment_type: {
        required: true
      },
      category: {
        required: true
      },
      amount: {
        required: true,
        digits:true
      }
    };

    var messages = {
      payment_type: {
        required: "Please select Billing Type"
      },
      category: {
        required: "Please enter category"
      },
      amount: {
        required: "Please enter amount",
        didgits: "Amount should contain only Numbers"
      }

    };

    $("#payment-categoryval").validate({
      rules: rules,
      messages: messages
    });

    $("#editPaymentCategoryForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>