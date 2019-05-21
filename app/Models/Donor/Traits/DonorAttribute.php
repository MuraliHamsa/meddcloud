<?php

namespace App\Models\Donor\Traits;

/**
 * Class DonorAttribute
 * @package App\Models\Donor\Traits;
 */
trait DonorAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.donor.edit', $this) . '" class="btn btn-xs btn-primary edit-donor" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.donor.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-donor" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Donor" data-message="Are you sure to delete Donor?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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