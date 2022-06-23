<?php

// URL: https://leetcode.com/problems/n-queens/

class Solution
{
    private array $result = [];

    /**
     * @return string[][]
     */
    function solveNQueens(int $n): array
    {
        $board = [];
        for ($r = 0; $r < $n; $r++) {
            for ($c = 0; $c < $n; $c++) {
                $board[$r][$c] = '.';
            }
        }

        $columns = [];
        $posDiag = [];
        $negDiag = [];

        $this->backtrack($n, 0, $columns, $posDiag, $negDiag, $board);

        return $this->result;
    }

    function backtrack(int $n, int $row, array $columns, array $posDiag, array $negDiag, array $currentBoard): void
    {
        if ($row === $n) {
            $this->result[] = $this->createBoard($currentBoard, $n);
            return;
        }

        for ($c = 0; $c < $n; $c++) {
            if (in_array($c, $columns) || in_array($row - $c, $negDiag) || in_array($row + $c, $posDiag)) {
                continue;
            }

            array_push($columns, $c);
            array_push($posDiag, $row + $c);
            array_push($negDiag, $row - $c);
            $currentBoard[$row][$c] = 'Q';

            $this->backtrack($n, $row + 1, $columns, $posDiag, $negDiag, $currentBoard);

            array_pop($columns);
            array_pop($posDiag);
            array_pop($negDiag);
            $currentBoard[$row][$c] = '.';
        }
    }

    function createBoard(array $board, int $n): array
    {
        $res = [];
        for ($r = 0; $r < $n; $r++) {
            $res[] = implode('', $board[$r]);
        }
        return $res;
    }
}