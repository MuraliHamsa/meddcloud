<div class="col-md-12 payment ">
    <div class="col-md-3 payment_label" style="width: 50%">
        <label><?php echo $data['category'] ?></label> <i title="Remove <?php echo $data['category']; ?> from final bill "  class="fa fa-times payment-del fa-2x" style="color: red;cursor: hand;cursor: pointer; float: right;"></i>
    </div>
    <div class="col-md-9" style="width: 50%">
        <input type="text" class="form-control pay_in" name="category_amount[]" value="<?php echo $data['amount']; ?>" placeholder="amount" required>
        <input type="hidden" class="form-control pay_in" name="category_name[]" value="<?php echo $data['category']; ?>">
        <input type="hidden" class="form-control pay_in" name="category_id[]" value="<?php echo $data['category_id']; ?>">
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () { 
        $(".payment-del").on('click',function(){
            $(this).closest('.payment').remove();
        });
    });
</script> 