<?php

// URL: https://leetcode.com/problems/trapping-rain-water/

class Solution
{
    /**
     * @param int[] $height
     * @return int
     */
    function trap(array $height): int
    {
        $left = 0;
        $right = count($height) - 1;

        $leftMax = $height[$left];
        $rightMax = $height[$right];

        $result = 0;
        while ($left < $right) {
            if ($leftMax < $rightMax) {
                $left++;
                $leftMax = max($leftMax, $height[$left]);
                $result += $leftMax - $height[$left];
            } else {
                $right--;
                $rightMax = max($rightMax, $height[$right]);
                $result += $rightMax - $height[$right];
            }
        }

        return $result;
    }
}