<?php

namespace App\Models\Receptionist\Traits;

/**
 * Class ReceptionistAttribute
 * @package App\Models\Receptionist\Traits;
 */
trait ReceptionistAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.receptionist.edit', $this) . '" class="btn btn-xs btn-primary edit-receptionist" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.receptionist.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-receptionist" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Receptionist" data-message="Are you sure to delete Receptionist?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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