<?php

// URL: https://leetcode.com/problems/permutations/

class Solution
{
    private array $result = [];

    /**
     * @param int[] $nums
     * @return int[][]
     */
    function permute(array $nums): array
    {
        $this->dfs($nums, []);

        return $this->result;
    }

    function dfs(array $nums, array $solution): void
    {
        if (count($solution) === count($nums)) {
            $this->result[] = $solution;
            return;
        }

        for ($i = 0; $i < count($nums); $i++) {
            if (in_array($nums[$i], $solution)) {
                continue;
            }

            array_push($solution, $nums[$i]);
            $this->dfs($nums, $solution);
            array_pop($solution);
        }
    }
}