<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_favorite;
use App\Models\User;
class uses_profile extends Model
{
    use HasFactory;
    
    public function favorite() {
        return $this->belongsTo(user_favorite::class, 'id', 'user_id');
    }

    public function user_profile() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
