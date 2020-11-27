<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'tasks';

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id',
        'title',
        'content',
        'note',
        'end_date',
        'status',
        'assignee',
        'assignee_name',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
