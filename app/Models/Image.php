<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'url'];
    protected $hidden = [
        'apartment_id',
        'updated_at',
        'created_at',
        'path',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
