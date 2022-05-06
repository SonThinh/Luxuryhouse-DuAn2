<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email',
        'password',
        'name',
        'address',
        'gender',
        'birth',
        'phone',
        'google',
        'facebook',
        'avatar',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function host()
    {
        return $this->hasOne(Host::class, 'm_id', 'id');
    }

    public function bill()
    {
        return $this->hasMany(Bill::class, 'guest_id', 'id');
    }
}
