<?php

// URL: https://leetcode.com/problems/find-the-duplicate-number/

class Solution
{
    /**
     * @param int[] $nums
     */
    function findDuplicate(array $nums): int
    {
        sort($nums);

        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i] === $nums[$i + 1]) {
                return $nums[$i];
            }
        }

        // it will always have one dulpicate, so doesn't matter what you return here
        return -1;
    }
}