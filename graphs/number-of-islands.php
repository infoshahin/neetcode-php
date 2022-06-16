<?php

// URL: https://leetcode.com/problems/number-of-islands/

class Solution
{
    /**
     * @param string[][] $grid
     */
    function numIslands(array $grid): int
    {
        if ($grid === null || count($grid) === 0) {
            return 0;
        }

        $count = 0;
        $row = count($grid);
        $column = count($grid[0]);

        for ($r = 0; $r < $row; $r++) {
            for ($c = 0; $c < $column; $c++) {
                if ($grid[$r][$c] === '1') {
                    $this->dfs($grid, $r, $c);
                    $count++;
                }
            }
        }

        return $count;
    }

    function dfs(array &$grid, int $row, int $column): void
    {
        if (
            $row >= count($grid) ||
            $row < 0 ||
            $column >= count($grid[0]) ||
            $column < 0 ||
            $grid[$row][$column] !== '1'
        ) {
            return;
        }

        $grid[$row][$column] = 'Checked';

        $this->dfs($grid, $row - 1, $column);
        $this->dfs($grid, $row + 1, $column);
        $this->dfs($grid, $row, $column - 1);
        $this->dfs($grid, $row, $column + 1);
    }
}