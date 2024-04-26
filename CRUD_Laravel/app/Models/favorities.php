<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\user_profile;
class favorities extends Model
{
    use HasFactory;
    public function favorite() {
        return $this->belongsTo(user_profile::class, 'user_id', 'id');
    }

}
