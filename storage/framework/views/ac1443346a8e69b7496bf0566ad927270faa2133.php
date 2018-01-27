<?php echo e(Html::script("js/jquery.validate.min.js")); ?>

<script type="text/javascript"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $('.category-add').click(function (){
      $('button[type="submit"]').prop('disabled', false);
      var id = $(this).attr('id');
      var category = $('#category_label'+id).val();
      var amount = $('#category_amount'+id).val();
      $.ajax({
        url: "<?php echo e(route('admin.payment.getpayment')); ?>",
        method: 'GET',
        data: {amount: amount, category: category, category_id: id},

      }).success(function (response) {
        $('#push_content').append(response);
      });
    });


    $('#billingtype').change(function(){
      var id = $( "#billingtype option:selected" ).val();
      $.ajax({
        url: "<?php echo e(route('admin.payment.getcategory')); ?>",
        method: 'GET',
        data: {id: id},
      }).success(function (response) {
        $('#temp_payments').remove();
        $('#custom_payments').html(response);
      });

    });

    $(".payment-del").on('click',function(){
      $(this).closest('.payment').remove();
    });



  });

  $(function() {

    $("#paymentval").validate({
      rules: {
        'patient_id': {
          required: true
        },
        'category_amount.*': {
          required: true
        }
      },
      messages: {
        'patient_id': {
          required: "Please select patient"
        },
        'category_amount.*': {
          required: "Please select category amount"
        }
      }
    });

  });

</script>