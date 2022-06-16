<?php

// URL: https://leetcode.com/problems/maximum-subarray/

class Solution
{
    /**
     * @param int[] $nums
     */
    function maxSubArray(array $nums): int
    {
        $max = PHP_INT_MIN;
        $sum = 0;

        foreach ($nums as $num) {
            $sum += $num;

            if ($num > $sum) {
                $sum = $num;
            }

            if ($sum > $max) {
                $max = $sum;
            }
        }

        return $max;
    }
}