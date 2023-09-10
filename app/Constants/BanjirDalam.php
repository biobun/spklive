<?php

namespace App\Constants;

class BanjirDalam
{
    const F0 = "< 25 cm";
    const F1 = "25 - 50 cm";
    const F2 = "50 - 150 cm";
    const F3 = "> 150 cm";

    const F0_VALUE = 1;
    const F1_VALUE = 2;
    const F2_VALUE = 3;
    const F3_VALUE = 4;


    public static function getBanjirDalamConstant()
    {
        return [
            self::F0_VALUE => self::F0,
            self::F1_VALUE => self::F1,
            self::F2_VALUE => self::F2,
            self::F3_VALUE => self::F3
        ];
    }
}
