<?php

namespace App\Models;

use App\Models\GlobalScopes\IsNotExpired;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        self::EXPIRED_AT,
        self::USER_ID,
        self::PLAN_ID,
        self::PRICE,
        self::TRANSACTION_ID,
        self::PAID_AT,
        self::RECEIPT_CODE,
    ];

    const EXPIRED_AT = 'expired_at';
    const USER_ID = 'user_id';
    const PLAN_ID = 'plan_id';
    const PRICE = 'price';
    const TRANSACTION_ID = 'transaction_Id';
    const PAID_AT = 'paid_at';
    const RECEIPT_CODE = 'receipt_code';


    public static function booted()
    {
        static::addGlobalScope(new IsNotExpired());
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
