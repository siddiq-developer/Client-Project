<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInvitation extends Model
{
    use HasFactory;
    public function user_d()
    {
        return $this->belongsTo(User::class,'member_id');
    }
}
