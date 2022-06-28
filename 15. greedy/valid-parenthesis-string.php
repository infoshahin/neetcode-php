<?php

// URL: https://leetcode.com/problems/valid-parenthesis-string/

class Solution
{
    function checkValidString(string $s): bool
    {
        $leftMin = $leftMax = 0;

        foreach (str_split($s) as $char) {
            if ($char === '(') {
                $leftMin++;
                $leftMax++;
            } else if ($char === ')') {
                $leftMin--;
                $leftMax--;
            } else {
                $leftMin--;
                $leftMax++;
            }

            if ($leftMax < 0) {
                return false;
            }

            if ($leftMin < 0) {
                $leftMin = 0;
            }
        }

        return $leftMin === 0;
    }
}