<?php

// URL: https://leetcode.com/problems/search-in-rotated-sorted-array/

class Solution
{
    /**
     * @param int[] $nums
     */
    function search(array $nums, int $target): int
    {
        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = floor(($left + $right) / 2);

            if ($target === $nums[$mid]) {
                return $mid;
            }

            // number in left sorted portion
            if ($nums[$left] <= $nums[$mid]) {
                if ($target > $nums[$mid] || $target < $nums[$left]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            } else {
                // number in right sorted portion
                if ($target < $nums[$mid] || $target > $nums[$right]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }
        }

        return -1;
    }
}