<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name', 
        'client_phone',
        'tree_type',
        'tree_amount',
        'tree_size',
        'price',
        'delivery'
    ];
}
