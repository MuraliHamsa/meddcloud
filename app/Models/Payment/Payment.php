<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment\Traits\PaymentAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PaymentBillCategory;
use DB;

class Payment extends Model
{
    use PaymentAttribute;
    
    protected $table = 'payment';

    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = ['patient_id','payment_date','amount', 'vat', 'flat_vat', 'discount', 'flat_discount', 'gross_total', 'category_name', 'status', 'hospital_id'];

    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table;
    }

    public static function getPayment($id, $data)
    {
        $result = PaymentBillCategory::select('payment_bill_category.payment_category_id', DB::raw("SUM(payment.amount) as amount"), DB::raw("SUM(payment.flat_discount) as flat_discount"), DB::raw("SUM(payment.flat_vat) as flat_vat"))
        ->join('payment', 'payment.id', '=', 'payment_bill_category.payment_id')
        ->where('payment.hospital_id', $id)
        ->whereBetween('payment_date', [  date('Y-m-d', strtotime($data['from_date'])),  date('Y-m-d', strtotime($data['to_date'])) ])
        ->groupBy('payment_bill_category.payment_category_id')
        ->get();
        return $result;
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient\Patient')->withTrashed();
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital\Hospital');
    }

    public function medicine()
    {
        return $this->belongsTo('App\Models\Medicine\Medicine')->withTrashed();
    }

    public function payment_bill_category()
    {
        return $this->hasMany('App\Models\PaymentBillCategory');
    }

    
}
