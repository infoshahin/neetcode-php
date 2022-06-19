<?php

// URL: https://leetcode.com/problems/contains-duplicate/

class Solution
{
    /**
     * @param int[] $nums
     */
    function containsDuplicate(array $nums): bool
    {
        $values = [];
        foreach ($nums as $num) {
            if (isset($values[$num])) return true;

            $values[$num] = true;
        }

        return false;
    }
}