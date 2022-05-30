<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'uuid','user_id','customer_id','discount','total','type','payment_method','cashier_id','price_total','discount_type', 'point'
    ];

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'invoice_items');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function invoices_by_payment_method()
    {
        return $this->hasMany(Invoice::class, 'payment_method', 'payment_method');
    }

}
