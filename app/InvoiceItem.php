<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id','item_id'
    ];

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
