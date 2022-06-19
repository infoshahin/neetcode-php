<?php

// URL: https://leetcode.com/problems/kth-largest-element-in-an-array/

class SolutionUsingSorting
{
    /**
     * @param int[] $nums
     */
    function findKthLargest(array $nums, int $k): int
    {
        rsort($nums);

        return $nums[$k - 1];
    }
}

class SolutionUsingHeap
{
    /**
     * @param int[] $nums
     */
    function findKthLargest(array $nums, int $k): int
    {
        $heap = new SplMinHeap();

        foreach ($nums as $num) {
            if ($heap->count() < $k) {
                $heap->insert($num);
            } else if ($heap->top() < $num) {
                $heap->extract();
                $heap->insert($num);
            } else {
            }
        }

        return (int) $heap->top();
    }
}