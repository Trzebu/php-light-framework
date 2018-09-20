<?php

namespace Libs\Tools;

class HumanFileSize {

    public static function get ($size, $short = false) {
        $type = !$short ? "full" : "short";
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }

        return round($size, $precision) . " " . trans("file_size_units.{$type}.{$i}");;
    }

}