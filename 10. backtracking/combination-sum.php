<?php

// URL: https://leetcode.com/problems/combination-sum/

class Solution
{
    /**
     * @var int[][]
     */
    private array $result = [];

    /**
     * @param int[] $candidates
     * @param int $target
     * @return int[][]
     */
    function combinationSum(array $candidates, int $target): array
    {
        $this->dfs($candidates, 0, $target, 0, []);

        return $this->result;
    }

    function dfs(array $candidates, int $sum, int $target, int $index, array $solution): void
    {
        if ($sum > $target) {
            return;
        } else if ($sum === $target) {
            $this->result[] = $solution;
        } else {
            for ($i = $index; $i < count($candidates); $i++) {
                if ($sum + $candidates[$i] <= $target) {
                    array_push($solution, $candidates[$i]);
                    $this->dfs($candidates, ($sum + $candidates[$i]), $target, $i, $solution);
                    array_pop($solution);
                }
            }
        }
    }
}