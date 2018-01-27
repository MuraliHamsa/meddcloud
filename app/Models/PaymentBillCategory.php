<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentBillCategory extends Model {

	protected $table = 'payment_bill_category';

	public $timestamps = true;

	use SoftDeletes;

	protected $fillable = ['payment_id', 'payment_category_id'];

	protected $dates = ['deleted_at'];

	public function payment() {
		return $this->belongsTo('App\Models\Payment\Payment');
	}

	public function payment_category() {
		return $this->belongsTo('App\Models\PaymentCategory\PaymentCategory');
	}

}
