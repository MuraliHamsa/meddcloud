<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Receptionist</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.receptionist.store', 'class' => 'form-horizontal', 'id' => 'receptionistval', 'method' => 'post', 'files'=>true]) }}
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.name') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.name')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.email') }}
              <span class="required">*</span>  
            </label>
            <div class="col-lg-10">
              {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.email')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.password') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.password')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.confirm_password') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.confirm_password')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.address') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.address')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.phone') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.phone')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.receptionist.image') }} 
            </label>
            <div class="col-lg-10">
              {{ Form::file('image', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.receptionist.image')]) }}
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