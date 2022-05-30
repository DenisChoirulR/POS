<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cashier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'cashier_id');
    }
}
