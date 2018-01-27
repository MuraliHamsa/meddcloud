{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      category: {
        required: true
      },
      description: {
        required: true
      }
    };

    var messages = {
      category: {
        required: "Please enter category"
      },
      description: {
        required: "Please enter description"
      }  
    };

    $("#bed-categoryval").validate({
      rules: rules,
      messages: messages
    });

    $("#editBedCategoryForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>