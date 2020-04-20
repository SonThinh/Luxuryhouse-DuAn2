<?php

namespace App\Models;

use App\Host;
use App\Model\Bill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'email',
        'password',
        'username',
        'address',
        'gender',
        'birth',
        'phone',
        'google',
        'facebook',
        'avatar',
        'description'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function host(){
        return $this->hasOne(Host::class,'m_id','id');
    }
    public function bill(){
        return $this->hasMany(Bill::class,'guest_id','id');
    }
}
