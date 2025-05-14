<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    //
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'prod_id',
        'name',
        'image',
        'price',
        'description',
    ];
    public $timestamps = true;
}
