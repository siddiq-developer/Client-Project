<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMemberEC extends Model
{
    use HasFactory;
    public function user_d()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function vote_d()
    {
        return $this->hasMany(EventVote::class,'ec_id','user_id');
    }
}
