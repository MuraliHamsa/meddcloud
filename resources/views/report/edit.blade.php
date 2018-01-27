<?php 
$roption = ['' => 'Select Report Type'];
if(!empty($report_type)){
  foreach($report_type as $type){
    $roption[$type->id] = $type->name;
  }
} 
$doption = ['' => 'Select Doctor'];
if(!empty($doctors)){
  foreach($doctors as $doctor){
    $doption[$doctor->id] = $doctor->name;
  }
} 
$poption = ['' => 'Select Patient'];
if(!empty($patients)){
  foreach($patients as $patient){
    $poption[$patient->id] = $patient->name;
  }
} ?>
<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Report</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.report.store', 'class' => 'form-horizontal', 'id' => 'editReportForm', 'method' => 'post']) }}
          
           <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.report.report_type') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('report_type_id', $roption, '', ['class' => 'form-control']) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 cmeontrol-label">
              {{ trans('validation.attributes.backend.report.report.description') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.report.report.description')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.report.patient') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('patient_id', $poption, '', ['class' => 'form-control']) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.report.doctor') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('doctor_id', $doption, '', ['class' => 'form-control']) }}
            </div>
          </div>

         <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.report.date') }} 
            </label>
            <div class="col-lg-10">
              {{ Form::text('add_date', null, ['class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.backend.report.report.date')]) }}
            </div>
          </div>

          {{ Form::hidden('id') }}
  
          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->