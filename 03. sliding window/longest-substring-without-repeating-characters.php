<?php

// URL: https://leetcode.com/problems/longest-substring-without-repeating-characters/

class Solution
{
    function lengthOfLongestSubstring(string $s): int
    {
        $chars = [];
        $left = $right = 0;

        $result = 0;
        while ($right < strlen($s)) {
            $r = $s[$right];
            $chars[$r]++;

            while ($chars[$r] > 1) {
                $l = $s[$left];
                $chars[$l]--;
                $left++;
            }
            $result = max($result, $right - $left + 1);

            $right++;
        }

        return $result;
    }
}