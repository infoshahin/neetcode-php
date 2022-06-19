<?php

// URL: https://leetcode.com/problems/group-anagrams/

class Solution
{
    /**
     * @param string[] $strs
     * @return string[][]
     */
    function groupAnagrams(array $strs): array
    {
        $map = [];
        foreach ($strs as $str) {
            $keyArray = str_split($str);
            sort($keyArray);
            $key = implode('', $keyArray);

            $map[$key][] = $str;
        }

        return array_values($map);
    }
}