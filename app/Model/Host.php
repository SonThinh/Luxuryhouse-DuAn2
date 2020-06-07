<?php

namespace App;

use App\Model\Bill;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'hosts';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'm_id',
        'status',
        'ID_card',
        'ID_card_image',
        'business_license',
        'business_license_image',
    ];
    public function house(){
        return $this->hasMany(House::class,'host_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'m_id','id');
    }
    public function bill(){
        return $this->HasMany(Bill::class,'host_id','id');
    }
}
