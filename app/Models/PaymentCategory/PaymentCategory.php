<?php

namespace App\Models\PaymentCategory;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentCategory\Traits\PaymentCategoryAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCategory extends Model
{
    use PaymentCategoryAttribute;
    
    protected $table = 'payment_category';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['payment_billing_id','category','amount','hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public function payment_billing()
    {
        return $this->belongsTo('App\Models\PaymentBilling\PaymentBilling')->withTrashed();
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    
}
