<?php

// URL: https://leetcode.com/problems/top-k-frequent-elements/

class Solution
{
    /**
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    function topKFrequent(array $nums, int $k): array
    {
        $count = array_count_values($nums);
        arsort($count);

        $keys = array_keys($count);

        return array_slice($keys, 0, $k);
    }
}