<?php

namespace App\Models;

use App\Casts\Rooms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public static function boot() {
        parent::boot();
        self::deleting(function($apartment) {
            $apartment->images()->each(function($image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function checkUserId(int $userId): bool
    {
        return $this->user_id === $userId;
    }
}
