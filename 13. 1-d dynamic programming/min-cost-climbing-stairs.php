<?php

// URL: https://leetcode.com/problems/min-cost-climbing-stairs/

class Solution
{
    /**
     * @param int[] $cost
     */
    function minCostClimbingStairs(array $cost): int
    {
        $count = count($cost);
        for ($i = 2; $i < $count; $i++) {
            $cost[$i] += min($cost[$i - 1], $cost[$i - 2]);
        }

        return min($cost[$count - 1], $cost[$count - 2]);
    }
}