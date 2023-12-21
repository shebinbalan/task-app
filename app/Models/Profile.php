<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'bio','date_of_birth','address','phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
