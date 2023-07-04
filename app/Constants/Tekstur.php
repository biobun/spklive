<?php

namespace App\Constants;

class Tekstur
{
    const H = "Halus";
    const AH = "Agak Halus";
    const S = "Sedang";
    const AK = "Agak Kasar";
    const K = "Kasar";
    const SH = "Sangat Halus";

    const H_VALUE = 0;
    const AH_VALUE = 1;
    const S_VALUE = 2;
    const AK_VALUE = 3;
    const K_VALUE = 4;
    const SH_VALUE = 5;


    public static function getTeksturConstant()
    {
        return [
            self::H_VALUE => self::H,
            self::AH_VALUE => self::AH,
            self::S_VALUE => self::S,
            self::AK_VALUE => self::AK,
            self::K_VALUE => self::K,
            self::SH_VALUE => self::SH,
        ];
    }
}
