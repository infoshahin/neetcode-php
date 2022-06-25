<?php

// URL: https://leetcode.com/problems/non-overlapping-intervals/

class Solution
{
    /**
     * @param int[][] $intervals
     */
    function eraseOverlapIntervals(array $intervals): int
    {
        usort($intervals, function (array $interval1, array $interval2) {
            return $interval1[0] <=> $interval2[0];
        });

        $result = 0;

        $prevEnd = $intervals[0][1];
        for ($i = 1; $i < count($intervals); $i++) {
            if ($intervals[$i][0] >= $prevEnd) {
                $prevEnd = $intervals[$i][0];
            } else {
                $result++;
                $prevEnd = min($intervals[$i][1], $prevEnd);
            }
        }

        return $result;
    }
}