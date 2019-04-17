<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku15;

class Dokaku15
{
    public function run(string $input) : string
    {
        // input
        $bin = sprintf('%08d', decbin((int) $input));
        $inputs = str_split($bin, 1);
        // remove no line
        for ($i = 0; $i < 8; $i++) {
            if ($inputs[$i] === '0') {
                unset($inputs[$i]);
            }
        }
        // init
        $lines = array_keys($inputs);
        $lines[] = 8 + $lines[0]; // virtual last line
        $polygonNum = count($lines) - 1;
        $result = [];
        // count
        for ($i = 0; $i < $polygonNum; $i++) {
            $distance = $lines[$i + 1] - $lines[$i];
            $polygon = $distance == 4 ? 5 : $distance + 2;
            $result[] = $polygon;
        }
        // format
        sort($result);

        return implode('', $result);
    }
}
