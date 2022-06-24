<?php

// URL: https://leetcode.com/problems/meeting-rooms-ii/
// URL: https://www.lintcode.com/problem/919/

/**
 * Definition of Interval:
 * class Interval {
 *     public int $start;
 *     public int $end;
 * 
 *     function __construct(int $start, int $end){
 *         $this->end = $end;
 *         $this->start = $start;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Interval[] $intervals
     */
    function min_meeting_rooms(array $intervals): int
    {
        $starts = [];
        $ends = [];

        foreach ($intervals as $interval) {
            $starts[] = $interval->start;
            $ends[] = $interval->end;
        }

        sort($starts);
        sort($ends);

        $result = 0;
        $count = 0;

        $s = 0;
        $e = 0;

        while ($s < count($starts)) {
            if ($starts[$s] < $ends[$e]) {
                $s++;
                $count++;
            } else {
                $e++;
                $count--;
            }
            $result = max($result, $count);
        }

        return $result;
    }
}