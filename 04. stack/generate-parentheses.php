<?php

// URL: https://leetcode.com/problems/generate-parentheses/

class Solution
{
    private array $stack = [];
    private array $result = [];

    private int $n;

    /**
     * @return string[]
     */
    function generateParenthesis(int $n): array
    {
        $this->n = $n;
        $this->backtrack(0, 0);

        return $this->result;
    }

    function backtrack(int $start, int $end): void
    {
        if ($start === $this->n && $end === $this->n) {
            $this->result[] = implode('', $this->stack);
            return;
        }

        if ($start < $this->n) {
            $this->stack[] = '(';
            $this->backtrack($start + 1, $end);
            array_pop($this->stack);
        }

        if ($end < $start) {
            $this->stack[] = ')';
            $this->backtrack($start, $end + 1);
            array_pop($this->stack);
        }
    }
}