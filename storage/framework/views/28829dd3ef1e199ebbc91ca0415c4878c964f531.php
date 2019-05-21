<?php $option = ['' => 'Select Blood Group'];
if(!empty($blood_bank)){
  foreach($blood_bank as $bbank){
    $option[$bbank->id] = $bbank->name;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Donor</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.donor.store', 'class' => 'form-horizontal', 'id' => 'editDonorForm', 'method' => 'post'])); ?>


          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.donor.name')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.group')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::select('blood_bank_id', $option, '', ['class' => 'form-control'])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.age')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('age', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.donor.age')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.sex')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::select('sex', array('1' => 'Male', '2' => 'Female', '3' => 'Other'), '', ['class' => 'form-control'])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.last_donation')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('last_donation', null, ['class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.backend.donor.last_donation')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.phone')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.donor.phone')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.donor.email')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.donor.email')])); ?>

            </div>
          </div>

          <?php echo e(Form::hidden('id')); ?>


          <?php echo e(Form::submit('Submit', ['class' => 'btn btn-info'])); ?>


        <?php echo e(Form::close()); ?>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->