<?php

// URL: https://leetcode.com/problems/container-with-most-water/

class Solution
{
    /**
     * @param int[] $height
     */
    function maxArea(array $height): int
    {
        $left = 0;
        $right = count($height) - 1;

        $result = 0;
        while ($left < $right) {
            $result = max($result,
                min($height[$left], $height[$right]) * ($right - $left)
            );

            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }

        return $result;
    }
}