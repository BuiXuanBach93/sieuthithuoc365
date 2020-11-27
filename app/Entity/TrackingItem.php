<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingItem extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'tracking_items';

    protected $primaryKey = 'tracking_id';

    protected $fillable = [
        'tracking_id',
        'type',
        'source_product_id',
        'source_product_name',
        'target_product_name',
        'target_product_id',
        'ip_customer',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
