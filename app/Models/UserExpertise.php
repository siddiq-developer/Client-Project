<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExpertise extends Model
{
    use HasFactory;
    protected $table = 'user_expertises';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
