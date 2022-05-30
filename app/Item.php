<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'uuid','code','qr_id','category_id','grade_id','price','reseller_price','remark', 'brand_id', 'colour', 'size', 'is_sold'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'item_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function invoice_item()
    {
        return $this->hasOne(InvoiceItem::class, 'item_id');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_items');
    }

    public function getinvoiceAttribute()
    {
        return $this->invoices()->first();
    }
}
