<?php echo e(Html::script("js/jquery.validate.min.js")); ?>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      bed_category_id: {
        required: true
      },
      number: {
        required: true,
        digits: true
      },
      description: {
        required: true
      }
      
    };

    var messages = {
      
      bed_category_id: {
        required: "Please select Bed category"
      },
      number: {
        required: "Please enter Bed number",
        digits: "Number should contain only digits"
      },
      description: {
        required: "Please enter description"
      }
       
    };

    $("#bedval").validate({
      rules: rules,
      messages: messages
    });

    $("#editBedForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>