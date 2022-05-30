<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrItem extends Model
{
    protected $fillable = [
        'code'
    ];

    public function item()
    {
        return $this->hasOne(Item::class, 'qr_id');
    }
}
