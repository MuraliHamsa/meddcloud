<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Department</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.department.store', 'class' => 'form-horizontal', 'id' => 'departmentval', 'method' => 'post']) }}
          <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.department.name') }} 
              <span class="required">*</span> 
            </label>
            <div class="col-lg-10">
              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.department.name')]) }}
            </div>
          </div>

         <div class="form-group">
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.department.description') }} 
              <span class="required">*</span> 
             </label>
            <div class="col-lg-10">
              {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => trans('validation.attributes.backend.department.description')]) }}
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