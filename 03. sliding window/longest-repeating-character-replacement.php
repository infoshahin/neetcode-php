<?php

// URL: https://leetcode.com/problems/longest-repeating-character-replacement/

class Solution
{
    function characterReplacement(string $s, int $k): int
    {
        $length = strlen($s);
        $count = [];

        $maxCount = 0;
        $maxLength = 0;
        $start = 0;
        for ($end = 0; $end < $length; $end++) {
            $count[$s[$end]]++;
            $maxCount = max($maxCount, $count[$s[$end]]);

            while ($end - $start + 1 - $maxCount > $k) {
                $count[$s[$start]]--;
                $start++;
            }
            $maxLength = max($maxLength, $end - $start + 1);
        }

        return $maxLength;
    }
}