<?php

// URL: https://leetcode.com/problems/valid-palindrome/

class SolutionUsingReverseFunction
{
    function isPalindrome(string $s): bool
    {
        $str = preg_replace("/[^a-z0-9]+/i", "", strtolower($s));

        if ($str == strrev($str)) {
            return true;
        }

        return false;
    }
}

class SolutionUsingTwoPointer
{
    function isPalindrome(string $s): bool
    {
        $str = preg_replace("/[^a-z0-9]+/i", "", strtolower($s));

        $strArray = str_split($str);

        for ($i = 0, $j = count($strArray) - 1; $i < $j; $i++, $j--) {
            if ($strArray[$i] !== $strArray[$j]) {
                return false;
            }
        }

        return true;
    }
}