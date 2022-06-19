<?php

// URL: https://leetcode.com/problems/reverse-integer/

class Solution
{
    const MAX_INT = 2147483647;     // 2^31-1
    const MIN_INT = -2147483648;    // -2^31

    function reverse(int $x): int
    {
        $result = ($x < 0) ? (int) strrev($x) * -1 : (int) strrev($x);

        if ($result < self::MIN_INT || $result > self::MAX_INT) {
            return 0;
        }

        return $result;
    }
}