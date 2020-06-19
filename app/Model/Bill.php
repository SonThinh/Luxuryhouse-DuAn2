<?php

namespace App\Model;

use App\Host;
use App\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'h_id',
        'host_id',
        'guest_id',
        'n_person',
        'check_in',
        'check_out',
        'request_guest',
        'date_range',
        'total',
        'status',
        'pay',
        'notify',
    ];
    public function house(){
        return $this->belongsTo(House::class,'h_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'guest_id','id');
    }
    public function host(){
        return $this->belongsTo(Host::class,'host_id','id');
    }
}
