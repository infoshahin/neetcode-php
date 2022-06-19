<?php

// URL: https://leetcode.com/problems/two-sum/

class Solution
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    function twoSum(array $nums, int $target): array
    {
        $hash = [];
        for ($i = 0; $i < count($nums); $i++) {
            $hash[$nums[$i]] = $i;
        }

        for ($i = 0; $i < count($nums) - 1; $i++) {
            $complement = $target - $nums[$i];

            if (isset($hash[$complement]) && $hash[$complement] !== $i) {
                return [$i, $hash[$complement]];
            }
        }

        return [];
    }
}