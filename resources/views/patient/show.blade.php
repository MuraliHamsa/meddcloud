@extends('layouts.app')

@section ('htmlheader_title', trans('labels.backend.patient.view'))

@section ('contentheader_title', trans('labels.backend.patient.view'))

@section('main-content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.backend.patient.view') }}</h3>
          <a href="{{ route('admin.patient.index') }}" class="btn btn-xs btn-primary pull-right">
            <i class="fa fa-arrow-left"></i>
            {{ trans('buttons.general.back') }}
          </a>
        </div>
        <div class="box-body">
          <table class="table">
            <tbody>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.name') }} : </strong></td>
                <td>{{ $patient->name }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.email') }} : </strong></td>
                <td>{{ $patient->email }}</td>
              </tr>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.doctor_id') }} : </strong></td>
                <td>{{ $patient->doctor['name'] }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.ref_doctor_id') }} : </strong></td>
                <td>{{ $patient->ref_doctor['name'] }}</td>
              </tr>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.age') }} : </strong></td>
                <td>{{ $patient->age }} {{ 'Yrs' }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.address') }} : </strong></td>
                <td>{{ $patient->address }}</td>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.phone') }} : </strong></td>
                <td>{{ $patient->phone }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.gender') }} : </strong></td>
                <td>
                  @if($patient->sex == 1)
                    {{ 'Male' }}
                  @elseif($patient->sex == 2)
                    {{ 'Female' }}
                  @endif
                </td>
              </tr>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.birthdate') }} : </strong></td>
                <td>{{ date("d-m-Y", strtotime($patient->birthdate)) }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.visit') }} : </strong></td>
                <td>
                  <?php switch($patient->visit) {
                    case 1: 
                      echo 'In Patient';
                      break;
                    case 2:
                      echo 'Out Patient';
                      break;
                    default:
                      echo 'Others';
                  }?>
                </td>
              </tr>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.bloodgroup') }} : </strong></td>
                <td>{{ $patient->blood_bank['name'] }}</td>
                <td><strong> {{ trans('validation.attributes.backend.patient.patient_id') }} : </strong></td>
                <td>{{ $patient->patientId }}</td>
              </tr>
              <tr>
                <td><strong> {{ trans('validation.attributes.backend.patient.image') }} : </strong></td>
                <td>
                  @if($patient->image)
                    <img src="{{ config('medcloud.image_url') }}patient/{{$patient->image}}" width="75" height="100">
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection