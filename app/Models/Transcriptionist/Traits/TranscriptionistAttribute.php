<?php

namespace App\Models\Transcriptionist\Traits;

/**
 * Class TranscriptionistAttribute
 * @package App\Models\Transcriptionist\Traits;
 */
trait TranscriptionistAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<button data-href="' . route('admin.transcriptionist.edit', $this) . '" class="btn btn-xs btn-primary edit-transcriptionist" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></button> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<form method="POST" action="' . route('admin.transcriptionist.destroy', $this) . '" style="display:inline"> <input name="_token" type="hidden" value="' .csrf_token(). '"><button class="btn btn-xs btn-danger delete-transcriptionist" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Medical Transcriptionist" data-message="Are you sure to delete Medical Transcriptionist?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></button></form>';
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