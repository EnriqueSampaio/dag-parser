<?php
    namespace App\Helpers;

    class Helper
    {
        public static function mb_str_split($string) {
            return preg_split('/(?<!^)(?!$)/u', $string );
        }

    }
