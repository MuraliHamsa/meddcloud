<!-- Add Event Modal-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><i class="fa fa-download"></i> Import Medicine</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'admin.medicine.import', 'class' => 'form-horizontal', 'id' => 'importMedicine', 'method' => 'post', 'files'=>true]) }}

         <div class="form-group">     
            <label class="col-lg-2 control-label">
              {{ trans('validation.attributes.backend.medicine.import_file') }} 
            </label>
            <div class="col-lg-10">
              {{ Form::file('import_file', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.medicine.import_file')]) }}
            </div>
          </div>
                     
          {{ Form::submit('Submit', ['class' => 'btn btn-info']) }}

        {{ Form::close() }}
        <br>
         <a href="{{ 'Medicine_Format.xlsx' }}"> Click here to for Sample Medicine Import format</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->