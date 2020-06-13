<?php

namespace App\Model;

use App\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'm_id',
        'h_id',
        'content',
        'status'
    ];
    public function house(){
        return $this->belongsTo(House::class,'h_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'m_id','id');
    }
}
