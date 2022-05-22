<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Media extends Model
{
    public $table = 'medias';

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
