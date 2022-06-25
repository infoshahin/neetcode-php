<?php

// URL: https://leetcode.com/problems/insert-interval/

class Solution
{
    /**
     * @param int[][] $intervals
     * @param int[] $newInterval
     * @return int[][]
     */
    function insert(array $intervals, array $newInterval): array
    {
        $result = [];

        foreach ($intervals as $index => $interval) {
            if ($newInterval[1] < $interval[0]) {
                $result[] = $newInterval;
                return array_merge($result, array_slice($intervals, $index));
            } else if ($newInterval[0] > $interval[1]) {
                $result[] = $interval;
            } else {
                $newInterval = [min($interval[0], $newInterval[0]), max($interval[1], $newInterval[1])];
            }
        }
        $result[] = $newInterval;

        return $result;
    }
}