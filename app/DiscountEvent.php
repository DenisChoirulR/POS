<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountEvent extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
        'code','name','discount','start_date','end_date','phone_number','messages','url'
    ];
}
