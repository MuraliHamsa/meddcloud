<div class="col-md-12 payment ">
    <div class="col-md-3 payment_label" style="width: 20%">
        <input type="text" name="medicine_name[]" value="<?php echo $data['name'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
    </div>

    <div class="col-md-3 payment_label" style="width: 20%">
        <input type="text" name="medicine_company[]" value="<?php echo $data['company'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
    </div>

    <div class="col-md-2 payment_label" style="width: 20%">
        <input type="text" name="medicine_price[]" value="<?php echo $data['price'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
    </div>

    <div class="col-md-2 payment_label" style="width: 20%">
        <input type="text" name="medicine_quantity[]" value="<?php echo $data['quantity'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
    </div>

    <div class="col-md-2 payment_label" style="width: 20%">
        <input type="text" name="medicine_amount[]" id="medicine_amount" value="<?php echo $data['medicine_amount'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
        <input type="hidden" class="form-control pay_in" name="medicine_id[]" value="<?php echo $data['id'];?>">
        <i id="<?php echo $data['id'];?>" class="fa fa-times payment-del fa-2x category-minus" title="Remove  <?php echo $data['name'];?> from final bill " style="color: red;cursor: hand;cursor: pointer; float: right;"></i>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".payment-del").on('click',function(){
            $(this).closest('.payment').remove();
        });
    });
</script>