<?php

// URL: https://leetcode.com/problems/climbing-stairs/

class Solution
{
    function climbStairs(int $n): int
    {
        if ($n <= 1) return 1;

        $ways = [];
        $ways[0] = 1;
        $ways[1] = 1;

        for ($i = 1; $i <= $n; $i++) {
            $ways[$i] = $ways[$i - 1] + $ways[$i - 2];
        }

        return $ways[$n];
    }
}