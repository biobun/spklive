<?php

namespace App\Constants;

class Drainase
{
    const ST = "Sangat Terhambat";
    const T = "Terhambat";
    const AT = "Agak Terhambat";
    const AB = "Agak Baik";
    const S = "Sedang";
    const AC = "Agak Cepat";
    const C = "Cepat";
    const B = "Baik";

    const ST_VALUE = 0;
    const T_VALUE = 1;
    const AT_VALUE = 2;
    const AB_VALUE = 3;
    const S_VALUE = 4;
    const AC_VALUE = 5;
    const C_VALUE = 6;
    const B_VALUE = 7;

    public static function getDrainaseConstant()
    {
        return [
            self::ST_VALUE => self::ST,
            self::T_VALUE => self::T,
            self::AT_VALUE => self::AT,
            self::AB_VALUE => self::AB,
            self::S_VALUE => self::S,
            self::AC_VALUE => self::AC,
            self::C_VALUE => self::C,
            self::B_VALUE => self::B,
        ];
    }
}
