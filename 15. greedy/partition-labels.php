<?php

// URL: https://leetcode.com/problems/partition-labels/

class Solution
{
    /**
     * @return int[]
     */
    function partitionLabels(string $s): array
    {
        $lastIndex = [];
        for ($j = 0; $j<strlen($s); $j++) {
            $lastIndex[$s[$j]] = $j;
        }

        $currentLength = 0;
        $goal = 0;

        $i = 0;
        $result = [];
        while ($i < strlen($s)) {
            $char = $s[$i];
            $goal = max($goal,
                $lastIndex[$char]
            );
            $currentLength++;

            if ($goal === $i) {
                $result[] = $currentLength;
                $currentLength = 0;
            }
            $i++;
        }

        return $result;
    }
}