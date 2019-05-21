<?php $poption = ['' => 'Select patient'];
if(!empty($patients)){
  foreach($patients as $patient){
    $poption[$patient->id] = $patient->name;
  }
} 

?>

<div class="box-body">
  <div class="col-lg-12 row">
    <div class="col-lg-10" style="text-align: right;">
      <label class="control-label">
        Doctor : 
      </label>  
    </div>
    <div class="col-lg-2">
      <label class="control-label">
        Sample 
      </label>  
    </div>
  </div>

  <div class="row">
    <label class="col-lg-2 control-label" style="text-align: right;">
      Patient 
      <span class="required">*</span> 
    </label>
    <div class="col-lg-4">
      <?php echo e(Form::select('patient_id', $poption, @$payment->patient_id, ['class' => 'form-control'])); ?>

    </div>
  </div> </br>

  <div class="row">
    <div class="col-lg-6">
      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> DRUG NAME </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> COMPANY NAME </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> QUANTITY </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> AMOUNT </strong>
          </label>
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width:25%">
          
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          
        </div>
      </div>

      <div id="custom_payments"></div>

      <div class="col-md-12 payment">
          <div class="col-md-12 payment ">
          
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> Total : </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:25%">
          <label class="payment_label">
            <strong> 55 </strong>
          </label>
        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 100%">
          <label class="payment_label"><strong>SEARCH</strong></label>
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 40%">
          <label class="payment_label"><strong>DRUGS</strong></label>
        </div>
        <div class="col-md-3 payment_label" style="width: 40%">
          <label class="payment_label"><strong>QUANTITY</strong></label>
        </div>  
        <div class="col-md-3 payment_label" style="width: 20%">
          <label class="payment_label"><strong>ADD</strong></label>
        </div>        
      </div>

      <?php if(!empty($medicines)): ?>
      <?php foreach($medicines as $category): ?>
      <div class="col-md-12 payment">
        <div class="col-md-4 payment_label" style="width: 40%">
          <label><?php echo e(ucfirst($category->name)); ?></label>
        </div>
        <div class="col-md-4 payment_label" style="width: 40%">
          <input type="text" class="form-control pay_in"  id="medicine_amount<?php echo $category->id; ?>" value='<?php echo $category->amount ;?>' >
          <input type="hidden" class="form-control pay_in"  id="medicine_label<?php echo $category->id; ?>" value='<?php echo $category->category ?>' placeholder="">
        </div>  
        <div class="col-md-4 payment_label" style="width: 15%; text-align: left;">
          <i id="<?php echo e($category->id); ?>" class="fa fa-plus-circle fa-2x category-add" title="Add <?php echo e($category->category); ?> to final bill " style="color: green;cursor: hand;cursor: pointer; float: right;"></i>
        </div>        
      </div>
      <?php endforeach; ?>
      <?php endif; ?>


    </div> 
</div> </div>

<div class="box-footer">
 <center><?php echo e(Form::submit('SUBMIT', ['class' => 'btn btn-info'])); ?></center>
</div>