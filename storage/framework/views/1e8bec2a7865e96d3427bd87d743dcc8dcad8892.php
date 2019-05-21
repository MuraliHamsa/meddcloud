<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Transcriptionist</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.transcriptionist.update', 'class' => 'form-horizontal', 'id' => 'editTranscriptionistForm', 'method' => 'post', 'files'=>true])); ?>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.name')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.email')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.email')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.password')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.password')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.confirm_password')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.confirm_password')])); ?>

            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.address')); ?> 
              <span class="required">*</span>
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.address')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.phone')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.phone')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.human_resources.transcriptionist.image')); ?> 
            </label>
            <div class="col-lg-5">
              <?php echo e(Form::file('image', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.transcriptionist.image')])); ?>

            </div>
            <div class="col-lg-5">
              <img src="" id="edit-image" />
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