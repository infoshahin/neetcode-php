<?php

// URL: https://leetcode.com/problems/partition-equal-subset-sum/

class Solution
{
    /**
     * @param int[] $nums
     */
    function canPartition(array $nums): bool
    {
        $sum = array_sum($nums);
        if ($sum % 2 === 1) {
            return false;
        }

        $half = $sum >> 1;

        $dp = [];
        foreach ($nums as $num) {
            foreach ($dp as $index => $summation) {
                if ($index + $num === $half) {
                    return true;
                }

                if ($index + $num < $half) {
                    $dp[$index + $num] = 1;
                }
            }
            $dp[$num] = 1;
        }

        return isset($dp[$half]);
    }
}