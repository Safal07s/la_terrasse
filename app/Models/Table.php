<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = 'tables';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'table_number',  // Example column for the table number
        'capacity',      // Example column for capacity
        'status',        // Example column for status (available, occupied, reserved)
    ];
}
