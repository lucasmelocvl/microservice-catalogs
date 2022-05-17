<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string'
    ];

    public $incrementing = false;
}
