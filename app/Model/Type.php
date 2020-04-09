<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'key',
        'name',
    ];
}
