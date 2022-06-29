<?php

// URL: https://leetcode.com/problems/house-robber-ii/

class Solution
{
    /**
     * @param int[] $nums
     */
    function rob(array $nums): int
    {
        return max(
            $nums[0],
            $this->helper(array_slice($nums, 1)),
            $this->helper(array_slice($nums, 0, -1))
        );
    }

    function helper(array $nums): int
    {
        $rob1 = 0;
        $rob2 = 0;

        foreach ($nums as $num) {
            $newRob = max($rob1 + $num, $rob2);
            $rob1 = $rob2;
            $rob2 = $newRob;
        }

        return $rob2;
    }
}