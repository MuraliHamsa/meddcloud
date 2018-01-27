<div class="box-body">
  <div class="col-lg-10">
    <div class="row">
      <label class="col-lg-3 control-label" style="text-align: right;">
        Select Patient :
      </label>
      <div class="col-lg-4">
        <select class='form-control input-sm' name= "patient" id="patient">
          <option value="">Select Patient</option>
          <?php foreach($patients as $patient): ?>
           <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div> </br>

    <div class="row">
      <label class="col-lg-3 control-label" style="text-align: right;">
        MODALITY :
      </label>
      <div class="col-lg-5">
      <!--  <?php echo e(Form::submit('X Ray', ['class' => 'btn'])); ?>

        <?php echo e(Form::submit('USG', ['class' => 'btn'])); ?>

        <?php echo e(Form::submit('CT', ['class' => 'btn'])); ?>

        <?php echo e(Form::submit('MRI', ['class' => 'btn'])); ?>

      -->
      <select class='form-control input-sm' name= "MODALITY" style="text-align: right; width: 330px">
        <option value="Default"></option>
        <option value="XRay">XRay</option>
        <option value="USG">USG</option>
        <option value="CT">CT</option>
        <option value="MRI">MRI</option>
        <option value="Test5"></option>
      </select>
        <?php echo e(Form::submit('Add MODALITY', ['class' => 'btn btn-success'])); ?>

      </div>
  </div> </br>

  <div class="row">
    <label class="col-lg-3 control-label" style="text-align: right;">
      Study Type :
    </label>
    <div class="col-lg-5">
    <select class='form-control input-sm' name= "MODALITY" style="text-align: right; width: 330px">
      <option value="Default"></option>
      <option value="Head">CT Head</option>
      <option value="Abdomen">CT Abdomen</option>
      <option value="CT PNS">CT PNS</option>
      <option value="CT NECK">CT NECK</option>
      <option value="CT FOOT">CT FOOT</option>
    </select>
      <?php echo e(Form::submit('Add Study Type', ['class' => 'btn btn-success'])); ?>

    </div>
</div> </br>

<div class="row">
  <label class="col-lg-3 control-label" style="text-align: right;">
    Reporting Template:
  </label>
  <div class="col-lg-5">
  <select class='form-control input-sm' name= "MODALITY" style="text-align: right; width: 330px">
    <option value="Default"></option>
    <option value="Head">MILD OEDMA</option>
    <option value="Abdomen">MENINGITS</option>
    <option value="CT PNS">HYDROCEPHALUS</option>
    <option value="Null"></option>
  </select>
    <?php echo e(Form::submit('Add Template', ['class' => 'btn btn-success'])); ?>

  </div>
</div> </br>



    <div class="row">
      <label class="col-lg-3 control-label" style="text-align: right;">
        Ref. Doctor :
      </label>
      <div class="col-lg-4">
        <select class='form-control input-sm' name= "doctor" id="doctor" readonly="readonly">
          <option value=""></option>
        </select>
      </div>
    </div> </br>

    <div class="row">
      <label class="col-lg-3 control-label" style="text-align: right;">
        Emergency Level :
      </label>
      <div class="col-lg-5">
      <select class='form-control input-sm' name= "MODALITY" style="text-align: right; width: 330px">
        <option value="Default"></option>
        <option value="Critical">Critical</option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
        <option value="Not Prioritized">Not Prioritized</option>
      </select>
      </div>
  </div> </br>

    <div class="row">
      <label class="col-lg-3 control-label" style="text-align: right;">
        Reporting Window :
      </label>
      <div class="col-lg-6">
          <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => trans('validation.attributes.backend.department.description')])); ?>

      </div>
    </div><br>
  </div>

  <div class="col-lg-2">
    <!--
    <div class="row">
      <?php echo e(Form::submit('Mark Emergency', ['class' => 'btn btn-danger'])); ?>

    </div></br>
  -->
    <div class="row">
      <?php echo e(Form::submit('Edit', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
    <div class="row">
      <?php echo e(Form::submit('Save', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
    <div class="row">
      <?php echo e(Form::submit('Finalize', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
    <div class="row">
      <?php echo e(Form::submit('Modify', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
    <div class="row">
      <?php echo e(Form::submit('Follow up', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
    <div class="row">
      <?php echo e(Form::submit('Print', ['style'=> 'width:100px','class' => 'btn btn-info' ])); ?>

    </div></br>
  </div>
</div>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#patient').on('change',function(e){
      console.log(e);
      var cat_id = e.target.value;
      $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
        $('#doctor').empty();
        $.each(data, function(index, doctor){
          $('#doctor').append('<option value="'+doctor.id+'">'+doctor.name+'</option>');
        });
      });
    });
  });
</script>
