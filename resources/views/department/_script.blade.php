{{ Html::script("js/jquery.validate.min.js") }}

<script type="text/javascript">
  $(document).ready(function () {
    
    var rules = {
      name: {
        required: true
      },
      description: {
        required: function() 
        {
          CKEDITOR.instances.description.updateElement();
        }
      }         
    };

    var erules = {
      name: {
        required: true
      },
      description: {
        required: function() 
        {
          CKEDITOR.instances.edit-description.updateElement();
        }
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

    $("#departmentval").validate({
      errorPlacement: function(error, element) 
      {
        if (element.attr("name") == "description") 
        {
          error.insertAfter("textarea#description");
        } else {
          error.insertAfter(element);
        }
      },
      rules: rules,
      messages: messages
    });

    $("#editDepartmentForm").validate({
      errorPlacement: function(error, element) 
      {
        if (element.attr("name") == "description") 
        {
          error.insertAfter("textarea#edit-description");
        } else {
          error.insertAfter(element);
        }
      },
      rules: erules,
      messages: messages
    });

  });
</script>