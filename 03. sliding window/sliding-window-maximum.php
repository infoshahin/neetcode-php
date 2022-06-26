<?php

// URL: https://leetcode.com/problems/sliding-window-maximum/

class Solution
{
    /**
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    function maxSlidingWindow(array $nums, int $k): array
    {
        if ($k == 1) {
            return $nums;
        }

        $count = count($nums);
        if ($k >= $count
        ) {
            return [max($nums)];
        }

        $result = [];
        $queue = new SplQueue();

        for ($i = 0; $i < $k; $i++) {
            while (!$queue->isEmpty() && $nums[$i] >= $nums[$queue->top()]) {
                $queue->pop();
            }
            $queue->push($i);
        }

        for (; $i <= $count; $i++) {
            $result[] = $nums[$queue->bottom()];

            if (!$queue->isEmpty() && $queue->bottom() <= $i - $k) {
                $queue->shift();
            }

            while (!$queue->isEmpty() && $nums[$i] >= $nums[$queue->top()]) {
                $queue->pop();
            }
            $queue->push($i);
        }

        return $result;
    }
}