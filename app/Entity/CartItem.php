<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'cart_items';

    protected $primaryKey = 'cart_item_id';

    protected $fillable = [
        'cart_item_id',
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'cost',
        'btn_type',
        'ip_customer',
        'origin_price',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
