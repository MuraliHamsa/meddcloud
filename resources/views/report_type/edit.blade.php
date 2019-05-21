<?php 
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
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Birth Report</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.birth-report.store', 'class' => 'form-horizontal', 'id' => 'editBirthReportForm', 'method' => 'post']) }}
          
           <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.birth-report.report_type') }}  
            </label>
            <div class="col-lg-10">
               {{ Form::select('report_type', array('1' => 'Birth', '2' => 'Operation', '3' => 'Expire'), '', ['class' => 'form-control']) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.birth-report.description') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.report.birth-report.description')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.birth-report.patient') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('patient', $poption, '', ['class' => 'form-control']) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.birth-report.doctor') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::select('doctor', $doption, '', ['class' => 'form-control']) }}
            </div>
          </div>

         <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.report.birth-report.date') }} 
            </label>
            <div class="col-lg-10">
              {{ Form::text('date', null, ['class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.backend.report.birth-report.date')]) }}
            </div>
        </div>

          

          {{ Form::hidden('id') }}

          {{ Form::hidden('user_id') }}

          {{ Form::hidden('hospital_id') }}
  
          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->