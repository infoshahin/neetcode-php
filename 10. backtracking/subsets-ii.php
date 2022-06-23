<?php

// URL: https://leetcode.com/problems/subsets-ii/

class Solution
{
    private array $result = [];

    /**
     * @param int[] $nums
     * @return int[][]
     */
    function subsetsWithDup(array $nums): array
    {
        sort($nums);
        $this->result[] = [];

        $this->backtrack($nums, [], 0);

        return $this->result;
    }

    function backtrack(array $nums, array $subset, int $begin): void
    {
        $last = null;

        for ($i = $begin; $i < count($nums);
            $i++
        ) {
            if ($i !== $begin && $nums[$i] === $last) {
                continue;
            }

            $last = $nums[$i];

            $this->result[] = array_merge($subset, [$nums[$i]]);

            $this->backtrack($nums, array_merge($subset, [$nums[$i]]), $i + 1);
        }
    }
}