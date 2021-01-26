<?php

namespace App\Models;

use App\Casts\Rooms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = ['user_id'];

    protected $casts = [
        'rooms' => Rooms::class,
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
