<?php

// URL: https://leetcode.com/problems/multiply-strings/

class Solution
{
    function multiply(string $num1, string $num2): string
    {
        if ($num1 === '0' || $num2 === '0') {
            return '0';
        }

        $results = [];
        for ($i = strlen($num1) - 1; $i >= 0; $i--) {
            for ($j = strlen($num2) - 1; $j >= 0; $j--) {
                $index = $j + $i + 1;
                $value = $results[$index] + ($num1[$i] - '0') * ($num2[$j] - '0');

                $results[$index] = $value % 10;
                $results[$index - 1] += intval($value / 10);
            }
        }

        $str = '';
        for ($i = 0; $i < count($results); $i++) {
            if ($i == 0 && $results[$i] == 0) {
                continue;
            }
            $str .= $results[$i] + '0';
        }

        return $str;
    }
}