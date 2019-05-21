<?php echo e(Html::script("js/jquery.validate.min.js")); ?>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      name: {
        required: true
      },
      blood_bank_id: {
        required: true
      },
      age: {
        required: true,
        digits: true
      },
      last_donation: {
        required: true
      },
      phone: {
        required: true,
        digits: true,
        minlength:10,
        maxlength:10
      },
      email: {
        required: true,
        email: true
      }
    };

    var messages = {
      name: {
        required: "Please enter name"
      },
      blood_bank_id: {
        required: "Please select blood group"
      },
      age: {
        required: "Please enter age",
        digits: "Age should contain only digits"
      },
      last_donation: {
        required: "Please select last donation date"
      },
      phone: {
        required: "Please enter phone number",
        digits: "Phone number should contain only digits",
        minlength: "Phone number should contain minimum 10 digits",
        maxlength: "Phone number should contain maximum 10 digits"
      },
      email: {
        required: "Please enter email",
        email: "Please enter a valid email"
      }   
    };

    $('.datepicker').datepicker();

    $("#donorval").validate({
      rules: rules,
      messages: messages
    });

    $("#editDonorForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>