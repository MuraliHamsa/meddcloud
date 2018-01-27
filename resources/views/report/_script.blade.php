{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      report_type_id: {
        required: true
      },
      
      description: {
        required: true
      },
      patient_id : {
        required : true
      },
      doctor_id: {
        required: true
      },
      date: {
        required: true
      }
    };

    var messages = {
      report_type_id: {
        required: "Please select report Type"
      },
      description: {
        required: "Please enter description"
      },
      patient_id: {
        required: "Please select patient"
      },
      
      doctor: {
        required: "Please select Doctor"
        
      },
      doctor_id: {
        required: "Please enter date"
      }  
    };

    $('.datepicker').datepicker();

    $("#reportval").validate({
      rules: rules,
      messages: messages
    });

    $("#editReportForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>