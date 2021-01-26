<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use MyCLabs\Enum\Enum;

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
class Rooms extends Enum implements CastsAttributes
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
     * @return Rooms
     */
    public function get($model, $key, $value, $attributes): Rooms
    {
        return new static($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  Rooms  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        return $value->getValue();
    }
}
