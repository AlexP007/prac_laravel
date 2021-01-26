<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token_generated_at',
        'updated_at',
        'created_at',
    ];

    public function generateToken(): void
    {
        while(true) {
            $token = Str::random(60);
            $this->api_token = $token;
            if (!static::where('api_token', $token)->first()) {
                break;
            }
        }
        $this->api_token_generated_at = Date::now();
        $this->save();
    }

}
