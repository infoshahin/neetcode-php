<?php

// URL: https://leetcode.com/problems/jump-game/

class Solution
{
    /**
     * @param int[] $nums
     */
    function canJump(array $nums): bool
    {
        $position = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($i + $nums[$i] > $position && $position >= $i) {
                $position = $nums[$i] + $i;
            }
        }

        if ($position >= count($nums) - 1) {
            return true;
        }

        return false;
    }
}