<?php $option = ['' => 'Select Department'];
if(!empty($department)){
  foreach($department as $dep){
    $option[$dep->id] = $dep->name;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Doctor</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.doctor.update', 'class' => 'form-horizontal', 'id' => 'editDoctorForm', 'method' => 'post', 'files'=>true])); ?>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.name')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.email')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.email')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.password')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.doctor.password')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.confirm_password')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.confirm_password')])); ?>

            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.address')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.address')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.phone')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.phone')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.department')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::select('department_id', $option, '',['class' => 'form-control'])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.doctor.image')); ?> 
            </label>
            <div class="col-lg-5">
              <?php echo e(Form::file('image', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.doctor.image')])); ?>

            </div>
            <div class="col-lg-5">
              <img src="" id="edit-image" width="75" height="100"/>
            </div>  
          </div>

          <?php echo e(Form::hidden('id')); ?>


          <?php echo e(Form::hidden('user_id', '', ['id' => 'user_id'])); ?>


          <?php echo e(Form::hidden('hospital_id')); ?>


          <?php echo e(Form::hidden('eimage')); ?>


          <?php echo e(Form::submit('Submit', ['class' => 'btn btn-info'])); ?>


        <?php echo e(Form::close()); ?>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->