<div class="box-body">
  <div class="col-lg-10">
    <div class="row">
      <label class="col-lg-2 control-label" style="text-align: right;">
        Select Patient :
      </label>
      <div class="col-lg-4">
        <select class='form-control input-sm' name= "patient" id="patient">
          <option value="">Select Patient</option>
          @foreach($patients as $patient)
           <option value="{{ $patient->id }}">{{ $patient->name }}</option>
          @endforeach
        </select>
      </div>
    </div> </br>

    <div class="row">
      <label class="col-lg-2 control-label" style="text-align: right;">
        Doctor :
      </label>
      <div class="col-lg-4">
        <select class='form-control input-sm' name= "doctor" id="doctor" readonly="readonly">
          <option value=""></option>
        </select>
      </div>
    </div> </br>

    <div class="row">
      <label class="col-lg-2 control-label" style="text-align: right;">
        Report type :
      </label>
      <div class="col-lg-4">
        <select class='form-control input-sm' name= "Result">
          <option value="Test1">Test1</option>
          <option value="Test2">Test2</option>
          <option value="Test3">Test3</option>
          <option value="Test4">Test4</option>
          <option value="Test5">Test5</option>
        </select>
      </div>
    </div> </br>

    <div class="row">
      <label class="col-lg-2 control-label" style="text-align: right;">
        Description :
      </label>
      <div class="col-lg-6">
          {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => trans('validation.attributes.backend.department.description')]) }}
      </div>
    </div> </br>
  </div>

  <div class="col-lg-2">
    <div class="row">
      {{ Form::submit('Edit', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
    </div></br>
    <div class="row">
      {{ Form::submit('Save', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
    </div></br>
    <div class="row">
      {{ Form::submit('Finalize', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
    </div></br>
    <div class="row">
      {{ Form::submit('Modify', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
    </div></br>
    <div class="row">
      {{ Form::submit('Follow up', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
    </div></br>
    <div class="row">
      {{ Form::submit('Print', ['style'=> 'width:100px','class' => 'btn btn-info' ]) }}
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
