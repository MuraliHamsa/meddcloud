<?php

namespace App\Models\Pharmacy\Traits;

/**
 * Class PaymentAttribute
 * @package App\Models\Payment\Traits;
 */
trait PharmacyAttribute {
	/**
	 * @return string
	 */
	public function getEditButtonAttribute() {
		if ($this->status == 0) {
			return '<a href="'.route('admin.pharmacy.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
		}
	}

	/**
	 * @return string
	 */
	public function getInvoiceButtonAttribute() {
		return '<a href="'.route('admin.pharmacy.invoice', $this).'" class="btn btn-xs btn-primary" ><i class="fa fa-file" title="'.trans('buttons.general.crud.invoice').'"></i></a> ';
	}

	/**
	 * @return string
	 */
	public function getDeleteButtonAttribute() {
		return '<form method="POST" action="'.route('admin.pharmacy.destroy', $this).'" style="display:inline"> <input name="_token" type="hidden" value="'.csrf_token().'"><button class="btn btn-xs btn-danger delete-payment" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Payment" data-message="Are you sure to delete Payment?" data-method="delete"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></button></form>';
	}

	/**
	 * @return string
	 */
	public function getActionButtonsAttribute() {
		return $this->getEditButtonAttribute().
		$this->getInvoiceButtonAttribute().
		$this->getDeleteButtonAttribute();
	}
}