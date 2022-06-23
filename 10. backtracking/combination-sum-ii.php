<?php

// URL: https://leetcode.com/problems/combination-sum-ii/

class Solution
{
    private array $result = [];

    /**
     * @param int[] $candidates
     * @param int $target
     * @return int[][]
     */
    function combinationSum2(array $candidates, int $target): array
    {
        sort($candidates);

        $this->dfs($candidates, 0, $target, 0, []);

        return $this->result;
    }

    /**
     * @param int[] $candidates
     * @param int $sum
     * @param int $target
     * @param int $index
     * @param int[] $solution
     */
    function dfs(array $candidates, int $sum, int $target, int $index, array $solution): void
    {
        $flag = false;

        if ($sum > $target) {
            return;
        } else if ($sum === $target) {
            $this->result[] = $solution;
            return;
        } else {
            for ($i = $index; $i < count($candidates); $i++) {
                if ($flag !== false && $i > 0 && $candidates[$i] === $candidates[$i - 1]) {
                    continue;
                }
                if ($sum + $candidates[$i] <= $target) {
                    array_push($solution, $candidates[$i]);
                    $this->dfs($candidates, $sum + $candidates[$i], $target, $i + 1, $solution);
                    array_pop($solution);

                    $flag = true;
                }
            }
        }
    }
}