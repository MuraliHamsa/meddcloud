<?php $option = ['' => 'Select Bed Id'];
if(!empty($beds)){
  foreach($beds as $bed){
    $option[$bed->id] = $bed->bedId;
  }
} 

$poption = ['' => 'Select Patient'];
if(!empty($patients)){
  foreach($patients as $patient){
    $poption[$patient->id] = $patient->name;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add New Allotment</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.bed-allotment.store', 'class' => 'form-horizontal', 'id' => 'bedallotmentval', 'method' => 'post']) }}

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed-allotment.bed_id') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('bed_id', $option, '', ['class' => 'form-control']) }}
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed-allotment.patient_id') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('patient_id', $poption, '', ['class' => 'form-control']) }}
            </div>
          </div>

               
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed-allotment.allotted_time') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('allotted_time', null, ['class' => 'form-control datetimepickerx', 'placeholder' => trans('validation.attributes.backend.bed.bed-allotment.allotted_time')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.bed.bed-allotment.discharge_time') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('discharge_time', null, ['class' => 'form-control datetimepickerx', 'placeholder' => trans('validation.attributes.backend.bed.bed-allotment.discharge_time')]) }}
            </div>
          </div>
          
          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->