<?php

// URL: https://leetcode.com/problems/last-stone-weight/

class Solution
{
    /**
     * @param int[] $stones
     */
    function lastStoneWeight(array $stones): int
    {
        $heap = new SplMaxHeap();

        if (count($stones) == 1) {
            return $stones[0];
        }

        if (count($stones) == 2) {
            return abs($stones[0] - $stones[1]);
        }

        foreach ($stones as $stone) {
            $heap->insert($stone);
        }

        while ($heap->count() > 1) {
            $largest1st = $heap->extract();
            $largest2nd = $heap->extract();

            if ($largest1st !== $largest2nd) {
                $heap->insert($largest1st - $largest2nd);
            }
        }

        return ($heap->count() === 0) ? 0 : $heap->top();
    }
}