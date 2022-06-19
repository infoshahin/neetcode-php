<?php

// URL: https://leetcode.com/problems/missing-number/

class SolutionUsingCountingSum
{
    /**
     * @param int[] $nums
     */
    function missingNumber(array $nums): int
    {
        $sum = 0;
        for ($i = 1; $i <= count($nums); $i++) {
            $sum += $i;
        }

        $given = 0;
        foreach ($nums as $num) {
            $given += $num;
        }

        return $sum - $given;
    }
}

class SolutionUsingBitwiseXOR
{
    /**
     * @param int[] $nums
     */
    function missingNumber(array $nums): int
    {
        $missing = 0;

        for ($i = 1; $i <= count($nums); $i++) {
            $missing ^= $i;
        }

        foreach ($nums as $num) {
            $missing ^= $num;
        }

        return $missing;
    }
}