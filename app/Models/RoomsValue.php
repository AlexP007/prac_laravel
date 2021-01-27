<?php

namespace App\Models;

use MyCLabs\Enum\Enum;

/**
 * Class Rooms
 * @package App\Casts
 *
 * @method static RoomsValue One()
 * @method static RoomsValue Two()
 * @method static RoomsValue Three()
 * @method static RoomsValue Four()
 * @method static RoomsValue Five()
 * @method static RoomsValue More()
 */
class RoomsValue extends Enum
{
    private const ONE = '1';
    private const TWO = '2';
    private const THREE = '3';
    private const FOUR = '4';
    private const FIVE = '5';
    private const MORE = '>5';
}
