<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_profile;
use App\Models\user_favorite;
class favorities extends Model
{
    use HasFactory;
    public function favorite() {
        return $this->belongsTo(user_profile::class, 'user_id', 'id');
    }

    public function favorities() {
        return $this->belongsTo(user_favorite::class, 'id', 'favorite_id');
    }

}
