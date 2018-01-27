<?php $option = ['' => 'Select Category'];
if(!empty($medicine_category)){
  foreach($medicine_category as $category){
    $option[$category->id] = $category->name;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Nurse</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.medicine.store', 'class' => 'form-horizontal', 'id' => 'editMedicineForm', 'method' => 'post'])); ?>


          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.name')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.category')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::select('medicine_category_id', $option, '', ['class' => 'form-control'])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.price')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('price', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.price')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.qty')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.qty')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.expiry_date')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('expiry_date', null, ['class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.expiry_date')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.generic')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('generic', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.generic')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.company')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('company', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.company')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine.effects')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('effects', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine.effects')])); ?>

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