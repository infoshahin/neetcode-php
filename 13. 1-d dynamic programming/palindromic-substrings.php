<?php

// URL: https://leetcode.com/problems/palindromic-substring/

class Solution
{
    function countSubstrings(string $s): int
    {
        $result = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            // odd length
            $result += $this->countPalindrome($s, $i, $i);

            // even length
            $result += $this->countPalindrome($s, $i, $i + 1);
        }

        return $result;
    }

    function countPalindrome(string $s, int $left, int $right): int
    {
        $result = 0;
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $result++;

            $left--;
            $right++;
        }

        return $result;
    }
}