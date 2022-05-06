<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = [
        'm_id',
        'h_id',
        'b_id',
        'content',
        'status'
    ];
    public function house(){
        return $this->belongsTo(House::class,'h_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'m_id','id');
    }
    public function bill(){
        return $this->belongsTo(Bill::class,'b_id','id');
    }
}
