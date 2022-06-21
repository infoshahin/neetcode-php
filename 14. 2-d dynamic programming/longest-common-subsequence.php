<?php

// URL: https://leetcode.com/problems/longest-common-subsequence/

class Solution
{
    function longestCommonSubsequence(string $text1, string $text2): int
    {
        $text1 = str_split($text1);
        $text2 = str_split($text2);

        $dp = [];
        for ($i = 0; $i < count($text1); $i++) {
            for ($j = 0; $j < count($text2); $j++) {
                if ($text1[$i] === $text2[$j]) {
                    $dp[$i][$j] = ($dp[$i - 1][$j - 1] ?? 0) + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i - 1][$j] ?? 0, $dp[$i][$j - 1] ?? 0);
                }
            }
        }

        return $dp[count($text1) - 1][count($text2) - 1];
    }
}