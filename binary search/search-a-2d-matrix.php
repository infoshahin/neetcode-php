<?php

// URL: https://leetcode.com/problems/search-a-2d-matrix/

class Solution
{
    /**
     * @param int[][] $matrix
     */
    function searchMatrix(array $matrix, int $target): bool
    {
        $nums = array_merge(...$matrix);

        $low = 0;
        $high = count($nums) - 1;

        while ($low <= $high) {
            $mid = floor(($high + $low) / 2);

            if ($nums[$mid] === $target) {
                return true;
            } else if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return false;
    }
}