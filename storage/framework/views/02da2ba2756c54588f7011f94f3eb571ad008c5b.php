<?php $option = ['' => 'Select Expense Category'];
if(!empty($expense_category)){
  foreach($expense_category as $category){
    $option[$category->id] = $category->category;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Expense</h4>
      </div>
      <div class="modal-body">
        <?php echo e(Form::open(['route' => 'admin.expense.store', 'class' => 'form-horizontal', 'id' => 'editExpenseForm', 'method' => 'post'])); ?>


          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.financial-activities.expense.category')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::select('expense_category_id', $option, '', ['class' => 'form-control'])); ?>

            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              <?php echo e(trans('validation.attributes.backend.financial-activities.expense.amount')); ?> 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              <?php echo e(Form::text('amount', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.financial-activities.expense.amount')])); ?>

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