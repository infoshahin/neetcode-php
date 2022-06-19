<?php

// URL: https://leetcode.com/problems/valid-parentheses/submissions/

class Solution
{
    function isValid(string $s): bool
    {
        $stack = [];

        $parentheses = [
            "(" => ")",
            "[" => "]",
            "{" => "}",
        ];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if (array_key_exists($char, $parentheses)) {
                array_push($stack, $char);
            } else {
                $lastElement = array_pop($stack);

                if ($char !== $parentheses[$lastElement]) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}