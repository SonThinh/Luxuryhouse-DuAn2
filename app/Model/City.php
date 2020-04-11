<?php

namespace App\Model;

use App\House;
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
    ];
    public function house(){
        return $this->hasMany(House::class,'city_id','id');
    }
    public function district(){
        return $this->hasMany(District::class,'city_id','id');
    }
}
