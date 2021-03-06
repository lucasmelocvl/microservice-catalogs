<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'name',
        'is_active'
    ];
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
        'is_active' => 'bool'
    ];

    public $incrementing = false;
}
