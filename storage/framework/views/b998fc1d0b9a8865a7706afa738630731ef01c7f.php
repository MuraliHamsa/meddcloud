<?php $option = ['' => 'Select Doctor'];
if(!empty($doctors)){
  foreach($doctors as $doctor){
    $option[$doctor->id] = $doctor->name;
  }
} 

$doption = ['' => 'Select Referring Doctor'];
if(!empty($doctors)){
  foreach($doctors as $ref_doctor){
    $doption[$ref_doctor->id] = $ref_doctor->name;
  }
} 

$bgroup = ['' => 'Select Blood Group'];
if(!empty($bloodgroup)){
  foreach($bloodgroup as $group){
    $bgroup[$group->id] = $group->name;
  }
}
?>

<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Patient</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.patient.store', 'class' => 'form-horizontal', 'id' => 'patientval', 'method' => 'post', 'files'=>true])); ?>


          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.doctor_id')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::select('doctor_id', $option, '', ['class' => 'form-control'])); ?>

            </div>
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.ref_doctor_id')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::select('ref_doctor_id', $doption, '', ['class' => 'form-control'])); ?>

            </div>
            </div>


            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.name')])); ?>

            </div>
                    
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.age')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('age', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.age')])); ?>

            </div>
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.email')); ?> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.email')])); ?>

            </div>
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.password')); ?> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.patient.password')])); ?>

            </div>
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.confirm_password')); ?> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.confirm_password')])); ?>

            </div>
          
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.address')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.address')])); ?>

            </div>
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.phone')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.phone')])); ?>

            </div>
          
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.gender')); ?>  
            </label>
            <div class="col-lg-4">
               <?php echo e(Form::select('sex', array('1' => 'Male', '2' => 'Female', '3' => 'Other'), '', ['class' => 'form-control'])); ?>

              
            </div>
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.birthdate')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::text('birthdate', null, ['class' => 'form-control datepicker'])); ?>

            </div>
                     
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.visit')); ?> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::select('visit', array('1' => 'InPatients', '2' => 'OutPatients', '3' => 'Others'), '', ['class' => 'form-control'])); ?>

            </div>
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.bloodgroup')); ?>

              <span class="required">*</span> 
            </label>
            <div class="col-lg-4">
              <?php echo e(Form::select('blood_bank_id', $bgroup, '', ['class' => 'form-control'])); ?>

            </div>
            </div>
            <div class="form-group">     
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.patient.image')); ?> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::file('image', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.patient.image')])); ?>

            </div>
          </div>
          
          <?php echo e(Form::submit('Submit', ['class' => 'btn btn-info'])); ?>


        <?php echo e(Form::close()); ?>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->