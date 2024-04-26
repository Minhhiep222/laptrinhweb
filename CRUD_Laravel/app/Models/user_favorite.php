<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\favorites;
class user_favorite extends Model
{
    use HasFactory;
    public function favorite() {
        return $this->belongsTo(favorites::class, 'id', 'user_id');
    }
}
