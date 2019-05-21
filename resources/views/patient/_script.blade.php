{{ Html::script("js/jquery.validate.min.js") }}

<script type="text/javascript">

    $(document).ready(function () {

      $.validator.addMethod("checkEmail", 
        function(value, element) {
          var result = false;
          var id = $('#user_id').val();
          $.ajax({
            type:"GET",
            async: false,
            url: "{{ route('admin.checkemail') }}", // script to validate in server side
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
         doctor_id: {
            required: true
          },
          ref_doctor_id: {
            required: true
          },
          name: {
            required: true
          },
          age: {
            required: true
          },
          email: {
            email: true,
            checkEmail: true
          },
          address: {
            required: true
          },
          password: {
            minlength: 5
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
          gender: {
            required: true
          },
          birthdate: {
            required: true
          },
          blood_bank_id: {
            required: true
          }
     };
     var messages = {
        doctor_id: {
          required: "Please select doctor"
        },
        ref_doctor_id: {
          required: "Please select referring doctor"
        },

         name: {
            required: "Please enter name"
          },
          age: {
            required: "Please enter patient age"
          },
          email: {
            required: "Please enter email",
            email: "Please enter valid email"
          },
          address: {
            required: "Please enter address"
          },
          password: {
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
          department: {
            required: "Please select department",
          }
          
     };

    $('.datepicker').datepicker();

    
      $("#patientval").validate({
        rules: rules,
        messages: messages
      });

      $("#editPatientForm").validate({
        ignore: 'input[name="password"]',
        rules: rules,
        messages: messages
      });

    });

  </script>