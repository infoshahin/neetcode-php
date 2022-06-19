<?php

// URL: https://leetcode.com/problems/permutation-in-string/

class Solution
{
    function checkInclusion(string $s1, string $s2): bool
    {
        $len1 = strlen($s1);
        $len2 = strlen($s2);

        $s1Count = $this->getCharCount($s1);
        $slidingWindowCount = $this->getCharCount(substr($s2, 0, $len1));

        for ($i = 1; $i <= $len2 - $len1 + 1; $i++) {
            if ($s1Count === $slidingWindowCount) {
                return true;
            }

            $swIndex = ord($s2[$i - 1]) - ord('a');
            $slidingWindowCount[$swIndex]--;

            $snIndex = ord($s2[$i - 1 + $len1]) - ord('a');
            $slidingWindowCount[$snIndex]++;
        }

        return false;
    }

    function getCharCount(string $str): array
    {
        $count = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($str); $i++) {
            $index = ord($str[$i]) - ord('a');
            $count[$index]++;
        }

        return $count;
    }
}