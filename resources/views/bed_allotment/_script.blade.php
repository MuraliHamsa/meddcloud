{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      bed_id: {
        required: true
      },
      patient_id: {
        required: true
      },
      allotted_time: {
        required: true
      },
      discharge_time: {
        required: true
      }
    };

    var messages = {
      bed_id: {
        required: "Please select Bed Id"
      },
      patient_id: {
        required: "Please select patient"       
      },
      allotted_time: {
        required: "Please enter Alloted Time"
      },
      discharge_time: {
        required: "Please enter discharge_time"
      }   
    };

    $('.datetimepickerx').datetimepicker({
      format:'DD/MM/YYYY HH:mm A',
      locale: 'en',
      collapse: true,
      showClose: true,
      minDate: 'now'
    });

    $("#bedallotmentval").validate({
      rules: rules,
      messages: messages
    });

    $("#editBedAllottedForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>