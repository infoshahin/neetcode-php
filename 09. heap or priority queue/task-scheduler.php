<?php

// URL: https://leetcode.com/problems/task-scheduler/

class Solution
{
    /**
     * @param string[] $tasks
     */
    function leastInterval(array $tasks, int $n): int
    {
        $tasksCount = array_count_values($tasks);
        $maxTaskCount = max($tasksCount);

        $maxTaskCountNumber = 0;
        foreach ($tasksCount as $taskCount) {
            if ($taskCount === $maxTaskCount) {
                $maxTaskCountNumber++;
            }
        }

        $result = ($maxTaskCount - 1) * ($n + 1) + $maxTaskCountNumber;

        return max($result, count($tasks));
    }
}