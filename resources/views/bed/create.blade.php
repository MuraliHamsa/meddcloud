<?php $option = ['' => 'Select Bed Category'];
if(!empty($bed_category)){
  foreach($bed_category as $category){
    $option[$category->id] = $category->category;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Bed</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.bed.store', 'class' => 'form-horizontal', 'id' => 'bedval', 'method' => 'post']) }}

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed.category') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('bed_category_id', $option, '', ['class' => 'form-control']) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed.number') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.bed.bed.number')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed.description') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.bed.bed.description')]) }}
            </div>
          </div>
        
          
          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->