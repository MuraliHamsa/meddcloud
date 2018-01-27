<?php echo e(Html::script("js/jquery.validate.min.js")); ?>


<script type="text/javascript">

    $(document).ready(function () {

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
            minlength: 5,
            required: true
          },
          password_confirmation: {
            minlength : 5,
            equalTo : "#password"
          },
          phone: {
            required: true,
            digits: true,
            minlength:10,
            maxlength:10
          },
          address: {
            required: true
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
            minlength: "Password should contain minimum 5 characters",
            required: "Please enter password"
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
          }
     };

      $("#hospitalval").validate({
        rules: rules,
        messages: messages
      });

      $("#editHospitalForm").validate({
        ignore: 'input[name="password"]',
        rules: rules,
        messages: messages
      });

    });

  </script>