<?php

// URL: https://leetcode.com/problems/minimum-window-substring/

class Solution
{
    function minWindow(string $s, string $t): string
    {
        $len_s = strlen($s);
        $len_t = strlen($t);

        if ($s === '' || $t === '' || $len_t > $len_s) return '';

        $result = '';
        $have = [];

        $need = array_count_values(str_split($t));
        $need_match = count($need);

        $left = 0;
        $right = 0;
        $match = 0;
        $min = PHP_INT_MAX;

        while ($right < $len_s) {
            $r_str = $s[$right];

            if (isset($have[$r_str])) {
                $have[$r_str]++;
            } else {
                $have[$r_str] = 1;
            }

            if ($have[$r_str] == $need[$r_str]) {
                $match++;
            }

            while ($match >= $need_match) {
                $result_len = $right - $left + 1;

                if ($result_len < $min) {
                    $min = $result_len;
                    $result = substr($s, $left, $min);
                }

                $l_str = $s[$left];
                $have[$l_str]--;

                if ($have[$l_str] == $need[$l_str] - 1) {
                    $match--;
                }

                $left++;
            }

            $right++;
        }

        return $result;
    }
}