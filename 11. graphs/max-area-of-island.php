<?php

// URL: https://leetcode.com/problems/max-area-of-island/

class Solution
{
    /**
     * @param int[][] $grid
     */
    function maxAreaOfIsland(array $grid): int
    {
        $area = 0;
        for ($r = 0; $r < count($grid); $r++) {
            for ($c = 0; $c < count($grid[0]); $c++) {
                if ($grid[$r][$c] === 1) {
                    $area = max($area, $this->dfs($grid, $r,
                        $c
                    ));
                }
            }
        }

        return $area;
    }

    function dfs(array &$grid, int $row, int $column): int
    {
        if (
            $row < 0 ||
            $row >= count($grid) ||
            $column < 0 ||
            $column >= count($grid[0]) ||
            $grid[$row][$column] !== 1
        ) {
            return 0;
        }

        $grid[$row][$column] = 'visited';

        return 1 +
            $this->dfs($grid, $row - 1, $column) +
            $this->dfs($grid, $row + 1, $column) +
            $this->dfs($grid, $row, $column - 1) +
            $this->dfs($grid, $row, $column + 1);
    }
}