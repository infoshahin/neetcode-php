<?php

// URL: https://leetcode.com/problems/jump-game-ii/

class Solution
{
    /**
     * @param int[] $nums
     */
    function jump(array $nums): int
    {
        $left = $right = 0;
        $result = 0;
        while ($right < count($nums) - 1) {
            $maxJump = 0;
            for ($i = $left; $i <= $right; $i++) {
                $maxJump = max($maxJump, $i + $nums[$i]);
            }
            $left = $right + 1;
            $right = $maxJump;
            $result++;
        }

        return $result;
    }
}