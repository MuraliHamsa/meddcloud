<?php

namespace App\Models\Nurse\Traits;

/**
 * Class NurseAttribute
 * @package App\Models\Nurse\Traits;
 */
trait NurseAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.nurse.edit', $this) . '" class="btn btn-xs btn-primary edit-nurse" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.nurse.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-nurse" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Nurse" data-message="Are you sure to delete Nurse?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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