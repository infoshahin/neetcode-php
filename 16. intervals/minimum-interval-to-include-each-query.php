<?php

// URL: https://leetcode.com/problems/minimum-interval-to-include-each-query/

class Solution
{
    /**
     * @param int[][] $intervals
     * @param int[] $queries
     * @return int[]
     */
    function minInterval(array $intervals, array $queries): array
    {
        usort($intervals, function (array $interval1, array $interval2) {
            return $interval1[0] <=> $interval2[0];
        });

        $copy = $queries;
        asort($copy);

        $heap = new SplMinHeap();
        $resultMap = [];
        $i = 0;

        foreach ($copy as $query) {
            while ($i < count($intervals) && $intervals[$i][0] <= $query
            ) {
                [$start, $end] = $intervals[$i];

                $heap->insert([$end - $start + 1, $end]);
                $i++;
            }

            while (!$heap->isEmpty() && $heap->top()[1] < $query) {
                $heap->extract();
            }

            $resultMap[$query] = ($heap->isEmpty()) ? -1 : $heap->top()[0];
        }

        $result = [];
        foreach ($queries as $val) {
            $result[] = $resultMap[$val];
        }

        return $result;
    }
}