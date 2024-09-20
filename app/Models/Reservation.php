<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations'; // if not 'reservations'

    use HasFactory;
    protected $fillable=[
        'customer_name',
        'phone',
        'table_number',
        'reservation_time',
        'reservation_date',
        'head_count',
        'special_request',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
