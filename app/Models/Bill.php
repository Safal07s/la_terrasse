<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'total_amount',
        'payment_type',
    ];

        // Define the relationship to BillItem
        public function items()
        {
            return $this->hasMany(Bill_Items::class);
        }
}
