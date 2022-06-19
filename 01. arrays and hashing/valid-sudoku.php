<?php

// URL: https://leetcode.com/problems/valid-sudoku/

class Solution
{
    /**
     * @param string[][] $board
     * @return bool
     */
    function isValidSudoku(array $board): bool
    {
        $rowMap = [];
        $columnMap = [];
        $squareMap = [];

        for ($row = 0; $row < 9; $row++) {
            for ($column = 0; $column < 9; $column++) {
                if ($board[$row][$column] === '.') {
                    continue;
                }

                $rowIndex = "row-$row-value-{$board[$row][$column]}";
                $columnIndex = "column-$column-value-{$board[$row][$column]}";
                $squareIndex = sprintf("square-%s-%s-value-%s", floor($row / 3), floor($column / 3), $board[$row][$column]);

                if (isset($rowMap[$rowIndex]) || isset($columnMap[$columnIndex]) || isset($squareMap[$squareIndex])) {
                    return false;
                }

                $rowMap[$rowIndex] = $columnMap[$columnIndex] = $squareMap[$squareIndex] = true;
            }
        }

        return true;
    }
}