<?php $option = ['' => 'All'];
if (!empty($payment_billing)) {
	foreach ($payment_billing as $billing) {
		$option[$billing->id] = $billing->name;
	}
}

$poption = ['' => 'Select patient'];
if (!empty($patients)) {
	foreach ($patients as $patient) {
		$poption[$patient->id] = $patient->name;
	}
}?>

<div class="box-body">
  <div class="form-group">
    <label class="col-lg-2 control-label">
      <?php echo e(trans('validation.attributes.backend.financial-activities.payment.patient_id')); ?>

      <span class="required">*</span>
    </label>
    <div class="col-lg-4">
      <?php echo e(Form::select('patient_id', $poption, @$payment->patient_id, ['class' => 'form-control'])); ?>

    </div>

    <label class="col-lg-2 control-label">
      <?php echo e(trans('validation.attributes.backend.financial-activities.payment.payment_billing')); ?>

      <span class="required">*</span>
    </label>
    <div class="col-lg-4">
      <?php echo e(Form::select('payment_billing', $option, '', ['class' => 'form-control', 'id' => 'billingtype'])); ?>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width:100%">
          <label class="payment_label">
            <strong> CHOOSE PAYMENT CATEGORY </strong>
          </label>
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width:50%">
          <label class="payment_label">
            <strong> PAYMENT CATEGORIES </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:50%">
          <label class="payment_label">
            <strong> AMOUNT </strong>
          </label>
        </div>
      </div>

      <div id="temp_payments">
        <?php if(!empty($payment_category)): ?>
          <?php foreach($payment_category as $category): ?>
            <div class="col-md-12 payment">
              <div class="col-md-3 payment_label" style="width:50%">
                <label><?php echo e(ucfirst($category->category)); ?></label>
                <i id="<?php echo e($category->id); ?>" class="fa fa-plus-circle fa-2x category-add" title="Add <?php echo e($category->id); ?> to final bill " style="color: green;cursor: hand;cursor: pointer; float: right;"></i>
              </div>
              <div class="col-md-9" style="width: 50%">
                <input type="text" class="form-control pay_in"  id="category_amount<?php echo $category->id;?>" value='<?php echo $category->amount;?>' >
                <input type="hidden" class="form-control pay_in"  id="category_label<?php echo $category->id;?>" value='<?php echo $category->category?>' placeholder="">
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <div id="custom_payments"></div>

    </div>

    <div class="col-lg-6">
      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 100%">
          <label class="payment_label"><strong> FINAL PATIENT BILL</strong></label>
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 50%">
          <label class="payment_label"><strong>PAYMENT CATEGORIES</strong></label>
        </div>
        <div class="col-md-3 payment_label" style="width: 50%">
          <label class="payment_label"><strong>AMOUNT</strong></label>
        </div>
      </div>

      <?php if(!empty(@$payment->payment_bill_category)): ?>
        <?php foreach($payment->payment_bill_category as $category): ?>
          <div class="col-md-12 payment ">
            <div class="col-md-3 payment_label" style="width: 50%">
              <label><?php echo ucfirst($category->payment_category['category']);?></label>
              <i title="Remove <?php echo $category->payment_category['category'];?> from final bill "  class="fa fa-times payment-del fa-2x" style="color: red;cursor: hand;cursor: pointer; float: right;"></i>
            </div>
            <div class="col-md-9" style="width: 50%">
              <input type="text" class="form-control pay_in" name="category_amount[]" value="<?php echo $category->payment_category['amount'];?>" placeholder="amount">
              <input type="hidden" class="form-control pay_in" name="category_name[]" value="<?php echo $category->payment_category['category'];?>">
              <input type="hidden" class="form-control pay_in" name="category_id[]" value="<?php echo $category->payment_category_id;?>">
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>


      <div id="push_content"></div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 50%">
          <label>Discount </label>
        </div>
        <div class="col-md-9" style="width: 50%">
          <input type="text" class="form-control pay_in" name="discount" placeholder="Discount" value="<?php echo e(@$payment->discount); ?>">
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 50%">
          <label>Vat (%)</label>
        </div>
        <div class="col-md-9" style="width: 50%">
          <input type="text" class="form-control pay_in" name="vat" value="<?php echo e(@$payment->vat); ?>" placeholder="%">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="box-footer">
  <?php echo e(Form::submit('Generate Bill', ['class' => 'btn btn-info'])); ?>

</div>