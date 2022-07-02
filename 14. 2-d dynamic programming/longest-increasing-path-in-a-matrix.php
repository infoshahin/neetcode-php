<?php

// URL: https://leetcode.com/problems/longest-increasing-path-in-a-matrix/

class Solution
{
    private array $dp = [];

    /**
     * @param int[][] $matrix
     */
    function longestIncreasingPath(array $matrix): int
    {
        for ($r = 0; $r < count($matrix); $r++) {
            for ($c = 0; $c < count($matrix[0]); $c++) {
                $this->dfs($matrix, $r, $c, -1);
            }
        }

        return max(array_values($this->dp));
    }

    function dfs(array $matrix, int $row, int $col, int $prevVal): int
    {
        if (
            $row < 0 ||
            $row >= count($matrix) ||
            $col < 0 ||
            $col >= count($matrix[0]) ||
            $matrix[$row][$col] <= $prevVal
        ) {
            return 0;
        }

        if (array_key_exists("$row-$col", $this->dp)) {
            return $this->dp["$row-$col"];
        }

        $result = 1;
        $result = max($result, 1 + $this->dfs($matrix, $row + 1, $col, $matrix[$row][$col]));
        $result = max($result, 1 + $this->dfs($matrix, $row - 1, $col, $matrix[$row][$col]));
        $result = max($result, 1 + $this->dfs($matrix, $row, $col + 1, $matrix[$row][$col]));
        $result = max($result, 1 + $this->dfs($matrix, $row, $col - 1, $matrix[$row][$col]));
        $this->dp["$row-$col"] = $result;

        return $result;
    }
}