<?php

// URL: https://leetcode.com/problems/surrounded-regions/

class Solution
{
    /**
     * @param string[][] $board
     */
    function solve(&$board): void
    {
        $rowCount = count($board);
        $columnCount = count($board[0]);

        // step-1: capture unsurrounded area to a temp (O -> T)
        for ($r = 0; $r < $rowCount; $r++) {
            for ($c = 0; $c < $columnCount; $c++) {
                if (($r == 0 || $c == 0 || $r == $rowCount - 1 || $c == $columnCount - 1) && $board[$r][$c] === 'O') {
                    $this->dfs($board, $r, $c);
                }
            }
        }

        // step-2: turn surrounded area to X (O -> X) and unsurrounded are to O (T -> O)
        for ($r = 0; $r < count($board); $r++) {
            for ($c = 0; $c < count($board[0]); $c++) {
                if ($board[$r][$c] === 'O') {
                    $board[$r][$c] = 'X';
                } else if ($board[$r][$c] === 'T') {
                    $board[$r][$c] = 'O';
                }
            }
        }
    }

    function dfs(array &$grid, $row, $column): void
    {
        $rowCount = count($grid);
        $columnCount = count($grid[0]);

        if (
            $row < 0 ||
            $row === $rowCount ||
            $column < 0 ||
            $column === $columnCount ||
            $grid[$row][$column] !== 'O'
        ) {
            return;
        }

        $grid[$row][$column] = 'T';

        $this->dfs($grid, $row - 1, $column);
        $this->dfs($grid, $row + 1, $column);
        $this->dfs($grid, $row, $column - 1);
        $this->dfs($grid, $row, $column + 1);
    }
}