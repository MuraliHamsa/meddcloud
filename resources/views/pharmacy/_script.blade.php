{{ Html::script("js/jquery.validate.min.js") }}
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $('.category-add').click(function (){
      $('button[type="submit"]').prop('disabled', false);
      var id = $(this).attr('id');
      var name = $('#medicine_label'+id).val();
      var quantity = $('#medicine_quantity'+id).val();
      var company = $('#medicine_company'+id).val();
      var price = $('#medicine_price'+id).val();
      var medicine_amount = quantity * price;
      var total = $('#txtresult'+id).val();
;
      $.ajax({
        url: "{{ route('admin.pharmacy.getpayment') }}",
        method: 'GET',
        data: {quantity: quantity, name: name, medicine_id: id, company: company, medicine_amount: medicine_amount, price: price, total: total, id: id},

      }).success(function (response) {
        $('#push_content').append(response);
      });
    });

    $('#billingtype').change(function(){
      var id = $( "#billingtype option:selected" ).val();
      $.ajax({
        url: "{{ route('admin.payment.getcategory') }}",
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
        'medicine_amount.*': {
          required: true
        }
      },
      messages: {
        'patient_id': {
          required: "Please select patient"
        },
        'medicine_amount.*': {
          required: "Please select category amount"
        }
      }
    });

  });

</script>