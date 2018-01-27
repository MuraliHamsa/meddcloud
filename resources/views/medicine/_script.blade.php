{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      name: {
        required: true
      },
      medicine_category_id: {
        required: true
      },
      price: {
        required: true,
        digits: true
      },
      generic: {
        required: true
      },
      effects: {
        required: true
      },
      import_file: {
        required: true
      }
    };

    var messages = {
      name: {
        required: "Please enter name"
      },
      medicine_category_id: {
        required: "Please select category"
      },
      price: {
        required: "Please enter price",
        digits: "Price should contain only digits"
      },
      generic: {
        required: "Please enter generic Name"
      },
      effects: {
        required: "Please enter effects"
      }  ,
      import_file:{
        required: "please select xls file"
      } 
    };

    $('.datepicker').datepicker();

    $("#medicineval").validate({
      rules: rules,
      messages: messages
    });

    $("#editMedicineForm").validate({
      rules: rules,
      messages: messages
    });

    $("#importMedicine").validate({
      rules: {
        import_file: {
          required: true
        }
      },
      messages: {
        import_file: {
          required: "Please select file"
        } 
      }
    });

  });

</script>