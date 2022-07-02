<?php

// URL: https://leetcode.com/problems/target-sum/

class Solution
{
    /**
     * @param int[] $nums
     */
    function findTargetSumWays(array $nums, int $target): int
    {
        $totalSum = array_sum($nums);

        if (($totalSum - $target) < 0 || ($totalSum - $target) % 2 != 0) {
            return 0;
        }

        return $this->subsetSumEqualsK(count($nums) - 1, ($totalSum - $target) / 2, $nums);
    }

    function subsetSumEqualsK(int $index,
        int $target,
        array $nums
    ): int {
        if ($index === 0) {
            if ($target === 0 && $nums[$index] == 0) {
                return 2;
            }
            if ($target === 0 || $nums[$index] === $target) {
                return 1;
            }
            return 0;
        }

        $notTaken = $this->subsetSumEqualsK($index - 1, $target, $nums);
        $taken = 0;
        if ($nums[$index] <= $target) {
            $taken = $this->subsetSumEqualsK($index - 1, $target - $nums[$index], $nums);
        }

        return $taken + $notTaken;
    }
}