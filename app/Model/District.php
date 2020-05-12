<?php

namespace App\Model;

use App\House;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'city_id',
    ];
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function house(){
        return $this->HasMany(House::class,'district_id','id');
    }
}
