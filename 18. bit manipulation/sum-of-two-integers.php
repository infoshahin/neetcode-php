<?php

// URL: https://leetcode.com/problems/sum-of-two-integers/

class Solution
{
    function getSum(int $a, int $b): int
    {
        while ($b !== 0) {
            $temp = ($a & $b) << 1;
            $a = $a ^ $b;
            $b = $temp;
        }

        return $a;
    }
}