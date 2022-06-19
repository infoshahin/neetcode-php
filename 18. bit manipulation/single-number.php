<?php

// URL: https://leetcode.com/problems/single-number/

class Solution
{
    /**
     * @param int[] $nums
     */
    function singleNumber(array $nums): int
    {
        $result = 0;    // 0 doesn't have any affect on XOR operation
        foreach ($nums as $num) {
            $result = $num ^ $result;
        }

        return $result;
    }
}