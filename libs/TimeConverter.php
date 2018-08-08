<?php

namespace Libs;

class TimeConverter {

    public function diffToHuman ($time) {
        $time = is_string($time) ? strtotime($time) : $time;
        $now = time();

        $human_diff = $time > $now ? self::greaterThenNow($time - $now) : self::lessThenNow($now - $time);

        return $human_diff;
    }

    private static function lessThenNow ($diff) {
        $time = self::calcTime($diff);

        if ($time["m"] == 0 && $time["h"] == 0) {
            //sec
        } else if ($time["h"] == 0) {
            //min
        } else {
            //h
        }

    }

    private static function greaterThenNow ($diff) {

    }

    private static function calcTime ($time) {
        $h = floor($time / 3600);
        $m = floor(($time / 60) % 60);
        $s = $time % 60;

        return (array) [
            "s" => $s,
            "m" => $m,
            "h" => $h
        ];
    }

}