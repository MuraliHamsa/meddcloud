<!-- Add Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Laboratorist</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.laboratorist.update', 'class' => 'form-horizontal', 'id' => 'editLaboratoristForm', 'method' => 'post', 'files'=>true]) }}
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.name') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.name')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.email') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.email')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.password') }}
              <span class="required">*</span>  
            </label>
            <div class="col-lg-10">
              {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.password')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.confirm_password') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.confirm_password')]) }}
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.address') }}
              <span class="required">*</span>  
            </label>
            <div class="col-lg-10">
              {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.address')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.phone') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.phone')]) }}
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.human_resources.laboratorist.image') }} 
            </label>
            <div class="col-lg-5">
              {{ Form::file('image', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.human_resources.laboratorist.image')]) }}
            </div>
            <div class="col-lg-5">
              <img src="" id="edit-image" width="75" height="100"/>
            </div>  
          </div>        

          {{ Form::hidden('id') }}

          {{ Form::hidden('user_id', '', ['id' => 'user_id']) }}

          {{ Form::hidden('hospital_id') }}

          {{ Form::hidden('eimage') }}

          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->