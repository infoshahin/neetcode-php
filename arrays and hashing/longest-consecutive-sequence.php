<?php

// URL: https://leetcode.com/problems/longest-consecutive-sequence/

class Solution
{
    /**
     * @param int[] $nums
     */
    function longestConsecutive(array $nums): int
    {
        sort($nums);

        $longest = (empty($nums)) ? 0 : 1;

        $consecutiveCount = 1;
        $current = $nums[0];

        foreach ($nums as $num) {
            if ($current + 1 === $num) {
                $consecutiveCount++;
            } else if ($current !== $num) {
                $consecutiveCount = 1;
            }
            $current = $num;
            $longest = max($consecutiveCount, $longest);
        }
        return $longest;
    }
}