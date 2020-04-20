<?php

namespace App;

use App\Model\Bill;
use App\Model\City;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'houses';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'city_id',
        'host_id',
        'utilities',
        'types',
        'name',
        'address',
        'room',
        'image',
        'description',
        'rules',
        'status',
        'h_status',
        'h_status',
        'trip_type',
        'price_detail',
    ];
    public function host(){
        return $this->belongsTo(House::class,'host_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function bill(){
        return $this->HasMany(Bill::class,'h_id','id');
    }
}
