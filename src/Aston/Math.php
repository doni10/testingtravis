<?php

namespace Aston;

use InvalidArgumentException;

class Math
{
    public static function divide(float $a, float $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException('Division By Zero');
        }

        return $a / $b;
    }
}
