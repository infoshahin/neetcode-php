<?php

// URL: https://leetcode.com/problems/product-of-array-except-self/

class Solution
{
    /**
     * @param int[] $nums
     * @return int[]
     */
    function productExceptSelf(array $nums): array
    {
        $count = count($nums);

        $result = [];
        $prefix = 1;
        for ($i = 0;
            $i < $count;
            $i++
        ) {
            $result[$i] = $prefix;
            $prefix *= $nums[$i];
        }

        $postfix = 1;
        for ($i = $count - 1; $i >= 0; $i--) {
            $result[$i] *= $postfix;
            $postfix *= $nums[$i];
        }

        return $result;
    }
}