<?php

// URL: https://leetcode.com/problems/binary-search/

class Solution
{
    /**
     * @param Integer[] $nums
     */
    function search(array $nums, int $target): int
    {
        $low = 0;
        $high = count($nums) - 1;

        while ($high >= $low) {
            $mid = floor(($high + $low) / 2);

            if ($nums[$mid] === $target) {
                return $mid;
            }

            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return -1;
    }
}