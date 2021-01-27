<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use App\Models\RoomsValue;

/**
 * Class Rooms
 * @package App\Casts
 *
 * @method static Rooms One()
 * @method static Rooms Two()
 * @method static Rooms Three()
 * @method static Rooms Four()
 * @method static Rooms Five()
 * @method static Rooms More()
 */
class Rooms implements CastsAttributes
{
    private const ONE = '1';
    private const TWO = '2';
    private const THREE = '3';
    private const FOUR = '4';
    private const FIVE = '5';
    private const MORE = '>5';

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return RoomsValue
     */
    public function get($model, $key, $value, $attributes): RoomsValue
    {
        return new RoomsValue($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  string  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        return $value;
    }
}
