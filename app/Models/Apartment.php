<?php

namespace App\Models;

use App\Casts\Rooms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = ['user_id'];

    protected $hidden = [
        'user_id',
        'updated_at',
        'created_at',
    ];

    protected $casts = [
        'rooms' => Rooms::class,
    ];

    public function __construct($userId, array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user_id = $userId;
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
