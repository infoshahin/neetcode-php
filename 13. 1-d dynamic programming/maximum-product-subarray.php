<?php

// URL: https://leetcode.com/problems/maximum-product-subarray/

class Solution
{
    /**
     * @param int[] $nums
     * @return int
     */
    function maxProduct(array $nums): int
    {
        $result = max($nums);
        $currentMin = 1;
        $currentMax = 1;

        foreach ($nums as $num) {
            $temp = $currentMax * $num;
            $currentMax = max($num * $currentMax, $num * $currentMin, $num);
            $currentMin = min($temp, $num * $currentMin, $num);

            $result = max($currentMax, $result);
        }

        return $result;
    }
}