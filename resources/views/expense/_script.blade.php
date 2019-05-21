{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(function() {

    var rules = {
      expense_category_id: {
        required: true
      },
      amount: {
        required: true,
        digits: true
      }      
    };

    var messages = {
      
      expense_category_id: {
        required: "Please select Expense category"
      },
      amount: {
        required: "Please enter amount",
        digits: "Amount should contain only digits"
      }
    };

    $("#expenseval").validate({
      rules: rules,
      messages: messages
    });

    $("#editExpenseForm").validate({
      rules: rules,
      messages: messages
    });

  });

</script>