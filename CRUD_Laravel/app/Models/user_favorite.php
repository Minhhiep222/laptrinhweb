<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_profile;
use App\Models\User;
use App\Models\favorities;
class user_favorite extends Model
{
    use HasFactory;
    public function favorite() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function favorities() {
        return $this->belongsTo(favorities::class, 'favorite_id', 'id');
    }
}
