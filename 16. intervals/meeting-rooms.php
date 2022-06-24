<?php 

// URL: https://leetcode.com/problems/meeting-rooms/ 
// URL: https://www.lintcode.com/problem/920/

class Interval {
    public int $start;
    public int $end;

    function __construct(int $start, int $end){
        $this->end = $end;
        $this->start = $start;
    }
}

class Solution {
    /**
     * @param Interval[] $intervals
     */
    function can_attend_meetings(array $intervals): bool {
        usort($intervals, function (Interval $interval1, Interval $interval2) {
            return $interval1->start <=> $interval2->start;
        });

        for ($i = 1; $i < count($intervals); $i++) {
            $interval1 = $intervals[$i-1];
            $interval2 = $intervals[$i];
        
            if ($interval1->end > $interval2->start) {
                return false;
            }
        }

        return true;
    }
}