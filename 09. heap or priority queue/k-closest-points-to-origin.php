<?php

// URL: https://leetcode.com/problems/k-closest-points-to-origin/

class Solution
{
    /**
     * @param int[][] $points
     * @param int $k
     * @return int[][]
     */
    function kClosest(array $points, int $k): array
    {
        $minHeap = new SplMinHeap;

        foreach ($points as $point) {
            $dis = pow(0 - $point[0], 2) + pow(0 - $point[1], 2);

            $minHeap->insert([$dis, $point]);
        }

        $result = [];
        while ($k) {
            $value = $minHeap->extract();
            $result[] = $value[1];
            $k--;
        }

        return $result;
    }
}