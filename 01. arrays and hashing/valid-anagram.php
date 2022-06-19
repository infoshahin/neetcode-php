<?php

// URL: https://leetcode.com/problems/valid-anagram/

class SolutionUsingSorting
{
    function isAnagram(string $s, string $t): bool
    {
        $s = str_split($s);
        $t = str_split($t);

        sort($s);
        sort($t);

        $s = implode('', $s);
        $t = implode('', $t);

        return ($s == $t) ? true : false;
    }
}

class SolutionUsingHashmap
{
    function isAnagram(string $s, string $t): bool
    {
        $sArray = array_count_values(str_split($s));
        $tArray = array_count_values(str_split($t));

        if (count($sArray) !== count($tArray)) {
            return false;
        }

        foreach ($sArray as $char => $count) {
            if (!array_key_exists($char, $tArray) || $sArray[$char] !== $tArray[$char]) {
                return false;
            }
        }

        return true;
    }
}