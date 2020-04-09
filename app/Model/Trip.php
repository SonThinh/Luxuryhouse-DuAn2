<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'key',
        'name',
    ];
}
