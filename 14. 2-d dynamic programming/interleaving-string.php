<?php

// URL: https://leetcode.com/problems/interleaving-string/

class Solution
{
    private string $s1;
    private string $s2;
    private string $s3;
    private int $len1;
    private int $len2;
    private int $len3;

    private array $cache = [];

    function isInterleave(string $s1, string $s2, string $s3): bool
    {
        if (strlen($s3) != strlen($s1) + strlen($s2)) {
            return false;
        }

        $this->s1 = $s1;
        $this->s2 = $s2;
        $this->s3 = $s3;

        $this->len1 = strlen($s1);
        $this->len2 = strlen($s2);
        $this->len3 = strlen($s3);

        $result = $this->dp(0, 0, 0);

        return $result;
    }

    function dp(int $i, int $p1, int $p2): bool
    {
        if ($i >= $this->len3) {
            return true;
        }

        if (isset($this->cache[$i][$p1][$p2])) {
            return $this->cache[$i][$p1][$p2];
        }

        if ($this->s3[$i] == ($this->s1[$p1] ?? 0)) {
            $r1 = $this->dp($i + 1, $p1 + 1, $p2);
        }

        if ($r1 ?? 0) {
            $this->cache[$i][$p1][$p2] = true;
            return true;
        }

        if ($this->s3[$i] == ($this->s2[$p2] ?? 0)) {
            $r2 = $this->dp($i + 1, $p1, $p2 + 1);
        }

        if ($r2 ?? 0) {
            $this->cache[$i][$p1][$p2] = true;
            return true;
        }

        $this->cache[$i][$p1][$p2] = false;

        return false;
    }
}