<?php

namespace App\Models\Pharmacist\Traits;

/**
 * Class PharmacistAttribute
 * @package App\Models\Pharmacist\Traits;
 */
trait PharmacistAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.pharmacist.edit', $this) . '" class="btn btn-xs btn-primary edit-pharmacist" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.pharmacist.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-pharmacist" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Pharmacist" data-message="Are you sure to delete Pharmacist?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}