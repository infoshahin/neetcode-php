<?php

// URL: https://leetcode.com/problems/longest-increasing-subsequence/

class Solution
{
    /**
     * @param int[] $nums
     * @return int
     */
    function lengthOfLIS(array $nums): int
    {
        $list = array_fill(0, count($nums), 1);

        for ($i = count($nums) - 1; $i >= 0; $i--) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($nums[$i] < $nums[$j]) {
                    $list[$i] = max($list[$i], 1 + $list[$j]);
                }
            }
        }

        return max($list);
    }
}