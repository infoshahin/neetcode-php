<?php

/*
 * URL: https://leetcode.com/problems/contains-duplicate/
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 * Hint: Use a hash table to store the values. If the value is already in the hash table, then it means that the value is already in the array.
 */ 

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