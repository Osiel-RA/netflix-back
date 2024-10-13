<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'user_id',
        'pay_method_id',
        'plan_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payMethod()
    {
        return $this->belongsTo(PayMethod::class);
    }

    public function planType()
    {
        return $this->belongsTo(PlanType::class);
    }
}
