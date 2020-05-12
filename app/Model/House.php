<?php

namespace App;

use App\Model\Bill;
use App\Model\City;
use App\Model\District;
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
        'district_id',
        'n_room',
        'n_bed',
        'n_bath',
        'max_guest',
        'image',
        'description',
        'rules',
        'status',
        'h_status',
        'h_status',
        'trip_type',
        'price_m_to_t',
        'price_f_to_s',
        'exGuest_fee',
        'min_night',
    ];
    public function host(){
        return $this->belongsTo(House::class,'host_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function bill(){
        return $this->HasMany(Bill::class,'h_id','id');
    }
}
