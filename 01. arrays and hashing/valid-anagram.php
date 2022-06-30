<?php

/*
 * URL: https://leetcode.com/problems/valid-anagram/
 * Time Complexity: O(nlog(n)+mlog(m))
 * Space Complexity: O(1) as we are not using any extra space.
 * Hint: Sort the strings and compare them.
 */

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

/*
* Time Complexity: O(n+m)
* Space Complexity: O(1) as we are only using constant 26 space for lowercase characters.
* Hint: Use a hash map to store the characters and their counts. Then compare the counts.
*/

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