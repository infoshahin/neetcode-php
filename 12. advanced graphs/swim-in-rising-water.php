<?php

// URL: https://leetcode.com/problems/swim-in-rising-water/

class Solution
{
    /**
     * @param int[][] $grid
     * @return int
     */
    function swimInWater(array $grid): int
    {
        $i = $j = 0;
        $N = count($grid);
        $visited = [$i * $N + $j => $grid[$i][$j]];

        $queue = new SplPriorityQueue();
        $queue->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $queue->insert($i * $N + $j, -$grid[$i][$j]);

        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];
        while (!$queue->isEmpty()) {
            $coord = $queue->extract();
            $i = intdiv($coord['data'], $N);
            $j = $coord['data'] % $N;
            $d = -$coord['priority'];

            if ($i === $N - 1 && $j === $N - 1) {
                return $d;
            }

            foreach ($dirs as $dir) {
                $ni = $i + $dir[0];
                $nj = $j + $dir[1];

                if (
                    $ni >= 0 &&
                    $ni < $N &&
                    $nj >= 0 &&
                    $nj < $N &&
                    !array_key_exists($ni * $N + $nj, $visited)
                ) {
                    $nd = max($d, $grid[$ni][$nj]);
                    $visited[$ni * $N + $nj] = $nd;
                    $queue->insert($ni * $N + $nj, -$nd);
                }
            }
        }
    }
}