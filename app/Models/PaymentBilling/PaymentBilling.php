<?php

namespace App\Models\PaymentBilling;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentBilling\Traits\PaymentBillingAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentBilling extends Model
{
    use PaymentBillingAttribute;
    
    protected $table = 'payment_billing';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [ 'name', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
