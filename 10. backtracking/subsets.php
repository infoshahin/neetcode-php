<?php

// URL: https://leetcode.com/problems/subsets/

class Solution
{
    private array $result = [];

    /**
     * @param int[] $nums
     * @return int[][]
     */
    function subsets(array $nums): array
    {
        $subset = [];

        $this->backtrack($nums, $subset,
            0
        );

        return $this->result;
    }

    function backtrack(array $nums, array $subset, int $index): void
    {
        if (count($subset) > count($nums)) {
            return;
        }

        $this->result[] = $subset;

        for ($i = $index; $i < count($nums);
            $i++
        ) {
            $num = $nums[$i];

            if (!in_array($num, $subset)) {
                array_push($subset, $num);
                $this->backtrack($nums, $subset, $i);
                array_pop($subset);
            }
        }
    }
}