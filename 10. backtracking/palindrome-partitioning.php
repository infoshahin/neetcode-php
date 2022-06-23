<?php

// URL: https://leetcode.com/problems/palindrome-partitioning/

class Solution
{
    private array $result = [];

    /**
     * @return string[][]
     */
    function partition(string $s): array
    {
        $this->palindromePartition($s);

        return $this->result;
    }

    function palindromePartition(string $s, array $partition = []): void
    {
        if (!$s) {
            $this->result[] = $partition;
            return;
        }

        for ($i = 0; $i < strlen($s); $i++) {
            $subStr = substr($s, 0, $i + 1);

            if ($subStr === strrev($subStr)) {
                $this->palindromePartition(substr($s, $i + 1), array_merge($partition, [$subStr]));
            }
        }
    }
}