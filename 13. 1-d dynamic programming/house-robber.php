<?php

// URL: https://leetcode.com/problems/house-robber/

class Solution
{
    /**
     * @param int[] $nums
     */
    function rob(array $nums): int
    {
        $robPath = [];

        foreach ($nums as $index => $num) {
            $robValue = $num + max($robPath[$index - 2], $robPath[$index - 3]);
            $robPath[$index] = $robValue;
        }

        return max($robPath);
    }
}