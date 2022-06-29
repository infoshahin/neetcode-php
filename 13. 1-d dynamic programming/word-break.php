<?php

// URL: https://leetcode.com/problems/word-break/

class Solution
{
    /**
     * @param array string[] $wordDict
     */
    function wordBreak(string $s, array $wordDict): bool
    {
        $length = strlen($s);

        $dp = array_fill(0, $length + 1, false);
        $dp[$length] = true;

        for ($i = $length - 1; $i >= 0; $i--) {
            foreach ($wordDict as $word) {
                $wordLen = strlen($word);
                if ($i + $wordLen <= $length && substr($s, $i, $wordLen) === $word) {
                    $dp[$i] = $dp[$i + $wordLen];
                }

                if ($dp[$i] === true) {
                    break;
                }
            }
        }

        return $dp[0];
    }
}