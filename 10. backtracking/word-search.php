<?php

// URL: https://leetcode.com/problems/word-search/

class Solution
{
    private array $board;
    private string $word;

    /**
     * @param string[][] $board
     */
    function exist(array $board, string $word): bool
    {
        $this->board = $board;
        $this->word = $word;

        for ($r = 0; $r < count($this->board); $r++) {
            for ($c = 0; $c < count($this->board[0]); $c++) {
                if ($this->dfs($r, $c, 0, [])) {
                    return true;
                }
            }
        }

        return false;
    }

    function dfs(int $row, int $col, int $index, array $paths): bool {
        if ($index === strlen($this->word)) {
            return true;
        }

        if (
            $row < 0 ||
            $col < 0 ||
            $row >= count($this->board) ||
            $col >= count($this->board[0]) ||
            $this->word[$index] !== $this->board[$row][$col] ||
            array_key_exists("$row-$col", $paths)
        ) {
            return false;
        }

        $paths["$row-$col"] = true;
        $index++;

        $result = $this->dfs($row + 1, $col, $index, $paths) ||
        $this->dfs($row - 1, $col, $index, $paths) ||
        $this->dfs($row, $col + 1, $index, $paths) ||
        $this->dfs($row, $col - 1, $index, $paths);

        unset($paths["$row-$col"]);
        $index--;

        return $result;
    }
}