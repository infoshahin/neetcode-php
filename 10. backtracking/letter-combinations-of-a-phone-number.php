<?php

// URL: https://leetcode.com/problems/letter-combinations-of-a-phone-number/

class Solution
{
    private const LETTERS = [
        '2' => 'abc',
        '3' => 'def',
        '4' => 'ghi',
        '5' => 'jkl',
        '6' => 'mno',
        '7' => 'pqrs',
        '8' => 'tuv',
        '9' => 'wxyz',
    ];

    private array $mappings = [];

    /**
     * @param string $digits
     * @return string[]
     */
    function letterCombinations(string $digits): array
    {
        if ($digits === '') return [];

        $this->dfs($digits, 0, '');

        return $this->mappings;
    }

    function dfs(string $digits, int $index, string $mapping): void
    {
        if ($index === strlen($digits)) {
            $this->mappings[] = $mapping;
            return;
        }

        for ($i = strlen(self::LETTERS[$digits[$index]]) - 1; $i >= 0; $i--) {
            $this->dfs($digits, $index + 1, $mapping . self::LETTERS[$digits[$index]][$i]);
        }
    }
}