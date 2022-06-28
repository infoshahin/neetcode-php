<?php

// URL: https://leetcode.com/problems/hand-of-straights/

class Solution
{
    /**
     * @param int[] $hand
     */
    function isNStraightHand(array $hand, int $groupSize): bool
    {
        if (count($hand) % $groupSize !== 0) {
            return false;
        }

        sort($hand);

        for ($i = 0; $i < count($hand) - 1; $i++) {
            if ($hand[$i] === null) {
                continue;
            }

            $goodCases = 1;
            $j = $i + 1;
            $lastGoodId = $i;
            $currentId = $i;

            while (($j < count($hand)) && ($goodCases < $groupSize)) {
                if ($hand[$j] !== null) {
                    $currentId = $j;
                    if ($hand[$currentId] - $hand[$lastGoodId] === 1) {
                        $goodCases++;
                        $hand[$lastGoodId] = null;
                        $lastGoodId = $currentId;
                    }
                }
                $j++;
            }
            if ($goodCases === $groupSize) {
                $hand[$currentId] = null;
            } else {
                return false;
            }
        }

        return true;
    }
}