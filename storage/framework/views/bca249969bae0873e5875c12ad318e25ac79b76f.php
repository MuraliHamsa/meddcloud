<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Medicine Category</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.medicine-category.store', 'class' => 'form-horizontal', 'id' => 'editMedicineCategoryForm', 'method' => 'post'])); ?>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine-category.name')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine-category.name')])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.medicine.medicine-category.description')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.medicine-category.description')])); ?>

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