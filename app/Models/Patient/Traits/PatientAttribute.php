<?php

namespace App\Models\Patient\Traits;

use Auth;

/**
 * Class PatientAttribute
 * @package App\Models\Patient\Traits;
 */
trait PatientAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.patient.edit', $this) . '" class="btn btn-xs btn-primary edit-patient" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getInvoiceButtonAttribute()
    {
        if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant']) && (count($this->payment)> 0) && ($this->visit != 2))
        {
            return '<a href="' . route('admin.patient.invoice', $this) . '" class="btn btn-xs btn-primary" ><i class="fa fa-file" title="' . trans('buttons.general.crud.invoice') . '"></i></a> ';
        }
    }

    /**
     * @return string
     */
    public function getBillButtonAttribute()
    {
        if(in_array(Auth::user()->group[0]['name'], ['admin', 'Accountant']) && (count($this->payment)> 0) && ($this->visit == 2))
        {
            return '<a href="' . route('admin.patient.bill', $this) . '" class="btn btn-xs btn-primary" ><i class="fa fa-file" title="' . trans('buttons.general.crud.bill') . '"></i></a> ';
        }
    }

    /**
     * @return string
     */
    public function getViewButtonAttribute()
    {
        return '<a href="' . route('admin.patient.show', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.patient.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-patient" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Patient" data-message="Are you sure to delete patient?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getViewButtonAttribute() .
        $this->getInvoiceButtonAttribute() .
        $this->getBillButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}