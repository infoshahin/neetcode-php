<?php

// URL: https://leetcode.com/problems/longest-palindromic-substring/

class Solution
{
    private string $s;
    private string $result = '';
    private int $resultLength = 0;

    function longestPalindrome(string $s): string
    {
        $this->s = $s;

        for ($i = 0; $i < strlen($this->s);
            $i++
        ) {
            // odd length
            $this->checkPalindrome($i, $i);

            // even length
            $this->checkPalindrome($i, $i + 1);
        }

        return $this->result;
    }

    function checkPalindrome(int $left, int $right): void
    {
        while (
            $left >= 0 &&
            $right < strlen($this->s) &&
            $this->s[$left] === $this->s[$right]
        ) {
            if (($right - $left + 1) > $this->resultLength) {
                $this->result = substr($this->s, $left, $right - $left + 1);
                $this->resultLength = $right - $left + 1;
            }
            $left--;
            $right++;
        }
    }
}