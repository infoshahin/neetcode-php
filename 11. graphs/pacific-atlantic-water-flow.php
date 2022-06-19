<?php

// URL: https://leetcode.com/problems/pacific-atlantic-water-flow/

class Solution
{
    private array $pacVisited = [];
    private array $atlVisited = [];
    private int $rowsCount;
    private int $colsCount;

    /**
     * @param int[][] $heights
     * @return int[][]
     */
    function pacificAtlantic(array $heights): array
    {
        $this->rowsCount = count($heights);
        $this->colsCount = count($heights[0]);

        for ($col = 0; $col < $this->colsCount; $col++) {
            $this->dfs(0, $col, $this->pacVisited, $heights[0][$col], $heights);
            $this->dfs($this->rowsCount - 1, $col, $this->atlVisited, $heights[$this->rowsCount - 1][$col], $heights);
        }

        for ($row = 0; $row < $this->rowsCount; $row++) {
            $this->dfs($row, 0, $this->pacVisited, $heights[$row][0], $heights);
            $this->dfs($row, $this->colsCount - 1, $this->atlVisited, $heights[$row][$this->colsCount - 1], $heights);
        }

        $res = [];
        for ($row = 0; $row < $this->rowsCount; $row++) {
            for ($col = 0; $col < $this->colsCount; $col++) {
                if (isset($this->pacVisited[$row . "_" . $col]) && isset($this->atlVisited[$row . "_" . $col])) {
                    $res[] = [$row, $col];
                }
            }
        }

        return $res;
    }

    function dfs(int $row, int $col, array &$visited, int $prevHeight, array $heights): void
    {
        if (
            $row < 0 ||
            $col < 0 ||
            $row == $this->rowsCount ||
            $col == $this->colsCount ||
            isset($visited[$row . "_" . $col]) ||
            $heights[$row][$col] < $prevHeight
        ) return;

        $visited[$row . "_" . $col] = $heights[$row][$col];

        $this->dfs($row + 1, $col, $visited, $heights[$row][$col], $heights);
        $this->dfs($row - 1, $col, $visited, $heights[$row][$col], $heights);
        $this->dfs($row, $col + 1, $visited, $heights[$row][$col], $heights);
        $this->dfs($row, $col - 1, $visited, $heights[$row][$col], $heights);
    }
}