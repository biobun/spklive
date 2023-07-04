<?php

namespace App\Constants;

class BanjirLama
{
    const D0 = "< 1 bulan";
    const D1 = "1 - 3 bulan";
    const D2 = "3 - 6 bulan";
    const D3 = "> 6 bulan";

    const D0_VALUE = 0;
    const D1_VALUE = 1;
    const D2_VALUE = 2;
    const D3_VALUE = 3;


    public static function getBanjirLamaConstant()
    {
        return [
            self::D0_VALUE => self::D0,
            self::D1_VALUE => self::D1,
            self::D2_VALUE => self::D2,
            self::D3_VALUE => self::D3
        ];
    }
}
