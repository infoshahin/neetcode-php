<?php

/**
 * URL: https://leetcode.com/problems/two-sum/
 * Time Complexity: O(n)
 * Space Complexity: O(n)
 * Hint: Use a hash map to store the numbers and their indices. Then compare the indices.
 */

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