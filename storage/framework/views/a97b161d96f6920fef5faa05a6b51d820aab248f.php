<?php echo e(Html::script("js/jquery.validate.min.js")); ?>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    $.validator.addMethod("checkEmail", 
        function(value, element) {
          var result = false;
          var id = $('#user_id').val();
          $.ajax({
            type:"GET",
            async: false,
            url: "<?php echo e(route('admin.checkemail')); ?>", // script to validate in server side
            data: {email: value, id: id},
            success: function(data) {
              result = (data == 1) ? true : false;
            }
          });
          return result; 
        }, 
        "Email is already exists"
      );


    var rules = {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true,
        checkEmail: true
      },
      password: {
        required: true,
        minlength: 5
      },
      password_confirmation: {
        minlength : 5,
        equalTo : "#password"
      },
      address: {
        required: true
      },
      phone: {
        required: true,
        digits: true,
        minlength:10,
        maxlength:10
      },
      image: {
        accept: "image/jpg,image/jpeg,image/png,image/gif"
      }
    };

    var messages = {
      name: {
        required: "Please enter name"
      },
      email: {
        required: "Please enter email",
        email: "Please enter valid email"
      },
      password: {
        required: "Please enter password",
        minlength: "Password should contain minimum 5 characters"
      },
      password_confirmation: {
        minlength: "Confirm Password should contain minimum 5 characters",
        equalTo: "Password and Confirm Password are not matching"
      },
      phone: {
        required: "Please enter phone number",
        digits: "Phone number should contain only numbers",
        minlength: "Phone number should contain minimum 10 digits",
        maxlength: "Phone number should contain maximum 10 digits"
      },
      address: {
        required: "Please enter address"
      },
      image: {
        accept: 'Image sholud be of jpg, jpeg, png, gif format'
      }   
    };

    $("#transcriptionistval").validate({
      rules: rules,
      messages: messages
    });

    $("#editTranscriptionistForm").validate({
      ignore: 'input[name="password"]',
      rules: rules,
      messages: messages
    });

  });

</script>