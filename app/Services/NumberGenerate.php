<?php

namespace App\Services;

class NumberGenerate
{
    static public function generate(int $count): int
    {
        $min = pow(10, $count - 1);
        $max = pow(10, $count) - 1;
        return mt_rand($min, $max);
    }
}