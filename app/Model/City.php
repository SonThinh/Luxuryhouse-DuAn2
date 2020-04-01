<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'image',
        'description',
        'areas',
    ];
}
