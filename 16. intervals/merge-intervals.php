<?php

// URL: https://leetcode.com/problems/merge-intervals/

class Solution
{
    /**
     * @param int[][] $intervals
     * @return int[][]
     */
    function merge(array $intervals): array
    {
        usort($intervals, function (array $interval1, array $interval2) {
            return $interval1[0] <=> $interval2[0];
        });

        $result[] = $intervals[0];

        for ($i = 1; $i < count($intervals); $i++) {
            $lastEnd = $result[array_key_last($result)][1];

            if ($lastEnd >= $intervals[$i][0]) {
                $result[array_key_last($result)][1] = max($lastEnd, $intervals[$i][1]);
            } else {
                $result[] = $intervals[$i];
            }
        }

        return $result;
    }
}