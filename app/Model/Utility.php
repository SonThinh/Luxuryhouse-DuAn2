<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    protected $table = 'utilities';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'symbol',
        'icon',
    ];
}
