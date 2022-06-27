<?php

// URL: https://leetcode.com/problems/network-delay-time/

/**
 * Time Complexity: O(E * logV)
 */
class Solution
{
    /**
     * @param int[][] $times
     */
    function networkDelayTime(array $times, int $n, int $k): int
    {
        $edges = [];
        foreach ($times as $time) {
            [$u, $v, $w] = $time;
            $edges[$u][] = [$w, $v];
        }

        $heap = new SplMinHeap();
        $heap->insert([0, $k]);

        $visit = [];
        $timeDelay = 0;

        while (!$heap->isEmpty()) {
            [$w1, $n1] = $heap->extract();

            if (in_array($n1, $visit)) {
                continue;
            }

            $visit[] = $n1;
            $timeDelay = max($timeDelay, $w1);

            foreach ($edges[$n1] as $edge) {
                [$w2, $n2] = $edge;
                if (!in_array($n2, $visit)) {
                    $heap->insert([$w1 + $w2, $n2]);
                }
            }
        }

        return (count($visit) === $n) ? $timeDelay : -1;
    }
}