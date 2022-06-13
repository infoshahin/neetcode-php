<?php

// URL: https://leetcode.com/problems/happy-number/

class Solution
{
    function isHappy(int $n): bool
    {
        $seen = [];
        while ($n !== 1 && !isset($seen[$n])) {
            $seen[$n] = true;
            $n = $this->getNext($n);
        }

        return $n === 1;
    }

    function getNext(int $n): int
    {
        $sum = 0;
        while ($n > 0) {
            $d = $n % 10;
            $n /= 10;
            $sum += $d * $d;
        }

        return $sum;
    }
}