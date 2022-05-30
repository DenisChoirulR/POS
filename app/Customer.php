<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','phone_number','email','is_reseller','point','point_count','join_date'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id');
    }
}
