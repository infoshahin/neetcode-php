<?php

// URL: https://www.lintcode.com/problem/659/
// URL: https://leetcode.com/problems/encode-and-decode-strings/

class Solution 
{
    /**
     * @param string[]  $strs
     */
    function encode(array $strs): string 
    {
        return implode('$$', $strs);
    }

    /**
     * @return string[]
     */
    function decode(string $str): array
    {
        return explode('$$', $str);
    }

}

$solution = new Solution;
$str = $solution->encode(['one', 'two', 'three']);
var_dump($str);
var_dump($solution->decode($str));
