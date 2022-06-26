<?php

// URL: https://leetcode.com/problems/powx-n/

class Solution
{
    function myPow(float $x, int $n): float
    {
        $result = $this->power($x, abs($n));

        return ($n >= 0) ? $result : 1 / $result;
    }

    function power(float $x, int $n): float
    {
        if ($x === 0) return 0;
        if ($n === 0) return 1;

        $result = $this->power($x * $x, intdiv($n, 2));

        return ($n % 2) ? $result * $x : $result;
    }
}