<?php $poption = ['' => 'Select patient'];
if (!empty($patients)) {
	foreach ($patients as $patient) {
		$poption[$patient->id] = $patient->name;
	}
}

// foreach($doctors as $doctor){
//   $doc[$doctor->patient_id.do]
// }

$medoption = ['' => 'Select drugs'];
if (!empty($medicins)) {
	foreach ($medicines as $medicine) {
		$medoption[$medicine->id] = $medicine->name;
	}
}?>

<div class="box-body">
  <!-- <div class="col-lg-12 row">
    <div class="col-lg-10" style="text-align: right;">
      <label class="control-label">
        Doctor :
      </label>
    </div>
    <div class="col-lg-2">
      <input type="text" name="Doctor" id='doctid' value="doctid" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
    </div>
  </div> -->

  <div class="row">
    <label class="col-lg-2 control-label" style="text-align: right;">
      Patient
      <span class="required">*</span>
    </label>
    <div class="col-lg-4">
      {{ Form::select('patient_id', $poption, @$payment->patient_id, ['class' => 'form-control patientinfo'], ['id' => 'patientid']) }}
    </div>
  </div> </br>

  <div class="row">
    <div class="col-lg-6">
      <div class="col-md-12 payment">

        <div class="col-md-3 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> DRUG NAME </strong>
          </label>
        </div>
        <div class="col-md-3 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> COMPANY NAME </strong>
          </label>
        </div>
        <div class="col-md-2 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> PRICE </strong>
          </label>
        </div>
        <div class="col-md-2 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> QUANTITY </strong>
          </label>
        </div>
        <div class="col-md-2 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> AMOUNT </strong>
          </label>
        </div>

      </div>

      <div id="push_content"></div>
      @if(!empty(@$pharmacy->pharmacy_drugs))
        @foreach($pharmacy->pharmacy_drugs  as $medicine)
         <div class="col-md-12 payment ">
            <div class="col-md-3 payment_label" style="width: 20%">
                <input type="text" name="medicine_name[]" value="<?php echo $medicine->medicine['name'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
            </div>

            <div class="col-md-3 payment_label" style="width: 20%">
                <input type="text" name="medicine_company[]" value="<?php echo $medicine->medicine['company'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
            </div>

            <div class="col-md-2 payment_label" style="width: 20%">
                <input type="text" name="medicine_price[]" value="<?php echo $medicine->medicine['price'];?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
            </div>

            <div class="col-md-2 payment_label" style="width: 20%">
                <input type="text" name="medicine_quantity[]" value="<?php echo $medicine->quantity;?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
            </div>

            <div class="col-md-2 payment_label" style="width: 20%">
                <input type="text" name="medicine_amount[]" id="medicine_amount" value="<?php echo $medicine->medicine_amount;?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
                <input type="hidden" class="form-control pay_in " name="medicine_id[]" value="<?php echo $medicine->medicine['id'];?>">
                <i id="{{ $medicine->id }}" title="Remove "  class="fa fa-times payment-del fa-2x category-minus" style="color: red;cursor: hand;cursor: pointer; float: right;"></i>
            </div>
          </div>
        @endforeach
      @endif

      <div class="col-md-12 payment">
          <div class="col-md-3 payment_label" style="width:20%">

        </div>
        <div class="col-md-3 payment_label" style="width:20%">

        </div>
        <div class="col-md-2 payment_label" style="width:20%">

        </div>
        <div class="col-md-2 payment_label" style="width:20%">
          <label class="payment_label">
            <strong> TOTAL : </strong>
          </label>
        </div>
        <div class="col-md-2 payment_label" style="width:20%">
          @if (empty($pharmacy->amount))
              <input type="text" id="txtresult" name="TextBox3" value="0" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
          @else
              <input type="text" id="txtresult" name="TextBox3" value="<?php echo $pharmacy->amount;?>" style="width: 100%; text-align: center; font-weight: bold; border: 0;" readonly="readonly">
          @endif
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 100%">
          <label class="payment_label"><strong>SEARCH</strong></label>
        </div>
      </div>

      <div class="col-md-12 payment">
        <div class="col-md-3 payment_label" style="width: 40%">
          <label class="payment_label"><strong>DRUGS</strong></label>
        </div>
        <div class="col-md-3 payment_label" style="width: 40%">
          <label class="payment_label"><strong>QUANTITY</strong></label>
        </div>
        <div class="col-md-3 payment_label" style="width: 20%">
          <label class="payment_label"><strong>ADD</strong></label>
        </div>
      </div>

      @if(!empty($medicines))
      @foreach($medicines as $medicine)
      <div class="col-md-12 payment">
        <div class="col-md-4 payment_label" style="width: 40%">

          <label>{{ ucfirst($medicine->name) }}</label>
        </div>
        <div class="col-md-4 payment_label" style="width: 40%">
          <input type="text" class="form-control pay_in"  id="medicine_quantity<?php echo $medicine->id;?>" value='<?php echo $medicine->quantity?>' placeholder="">
           <input type="hidden" class="form-control pay_in"  id="medicine_label<?php echo $medicine->id;?>" value='<?php echo $medicine->name?>' placeholder="">
          <input type="hidden" class="form-control pay_in"  id="medicine_company<?php echo $medicine->id;?>" value='<?php echo $medicine->company?>' placeholder="">
          <input type="hidden" class="form-control pay_in"  id="medicine_id<?php echo $medicine->id;?>" value='<?php echo $medicine->id?>' placeholder="">
          <input type="hidden" class="form-control pay_in"  id="medicine_price<?php echo $medicine->id;?>" value='<?php echo $medicine->price?>' placeholder="">
        </div>
        <div class="col-md-4 payment_label" style="width: 15%; text-align: left;">
          <i id="{{ $medicine->id }}" class="fa fa-plus-circle fa-2x category-add category-total" title="Add {{ $medicine->medicine }} to final bill " style="color: green;cursor: hand;cursor: pointer; float: right;"></i>
        </div>
      </div>
      @endforeach
      @endif


    </div>
</div> </div>

<div class="box-footer">
 <center>{{ Form::submit('SUBMIT', ['class' => 'btn btn-info']) }}</center>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".category-total").on('click',function(){
          var id = $(this).attr('id');
            var quantity = $('#medicine_quantity'+id).val();
            var price = $('#medicine_price'+id).val();
            var amount = quantity * price;
            var total = parseInt($('#txtresult').val());
            var total1 = total + amount;
            $("#txtresult").val(total1);
        });

        $(".category-minus").on('click',function(){
          var id = $(this).attr('id');
            var amount = $('#medicine_amount').val();
            var total = parseInt($('#txtresult').val());
            var total1 = total - amount;
            $("#txtresult").val(total1);
        });
    });
</script>