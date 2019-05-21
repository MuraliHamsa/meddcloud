{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      name: {
        required: true
      },
      description: {
        required: true
      }
    };

    var messages = {
      name: {
        required: "Please enter name"
      },
      description: {
        required: "Please enter description"
      }  
    };

    $("#medicine-categoryval").validate({
      rules: rules,
      messages: messages
    });

    $("#editMedicineCategoryForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>