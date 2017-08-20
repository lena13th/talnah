<?php

namespace app\modules\enum\helpers;

/**
 * Class BooleanEnum
 *
 * @package app\modules\enum\helpers
 */
class BooleanEnum extends BaseEnum
{
    const YES = 1;
    const NO = 0;

    public static $list = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];
}
