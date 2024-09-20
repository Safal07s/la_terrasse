<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'item_name',
        'item_price',
        'item_quantity',
        'item_total',
    ];

    // Define the relationship to the Bill model
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
