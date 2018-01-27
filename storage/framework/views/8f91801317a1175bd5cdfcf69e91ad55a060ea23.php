<?php if(!empty($payment_category)): ?>
    <?php foreach($payment_category as $category): ?>
        <div class="col-md-12 payment" id="pushtoright">
            <div class="col-md-3 payment_label" style="width: 50%">
                <label for="exampleInputEmail1"> <?php echo e($category->category); ?></label>
                <i id="<?php echo e($category->id); ?>" class="fa fa-plus-circle category-add fa-2x" title="Add <?php echo e($category->category); ?> to final bill " style="color: green;cursor: hand;cursor: pointer; float: right;"></i>
            </div>
            <div class="col-md-9" style="width: 50%">
                <input type="text" class="form-control pay_in" id="category_amount<?php echo $category->id ?>" value="<?php echo $category->amount ;?>"" placeholder="Rs">
                <input type="hidden" class="form-control pay_in"  id="category_label<?php echo $category->id ?>" value="<?php echo $category->category ?>"" placeholder="">
                    <input type="hidden" value="<?php echo $category->id ?>" id="ivalue"/>
            </div>

        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function () {

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

    });
</script>