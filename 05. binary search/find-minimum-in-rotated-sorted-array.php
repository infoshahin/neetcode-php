<?php

// URL: https://leetcode.com/problems/find-minimum-in-rotated-sorted-array/

class Solution
{
    /**
     * @param int[] $nums
     */
    function findMin(array $nums): int
    {
        $result = $nums[0];

        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            if ($nums[$left] < $nums[$right]) {
                $result = min($result, $nums[$left]);
                break;
            }

            $mid = floor(($left + $right) / 2);
            $result = min($result,
                    $nums[$mid]
                );

            if ($nums[$mid] >= $nums[$right]) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $result;
    }
}