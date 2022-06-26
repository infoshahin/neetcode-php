<?php

// URL: https://leetcode.com/problems/walls-and-gates/
// URL: https://www.lintcode.com/problem/663/

class Solution
{
    function walls_and_gates(array &$rooms): void
    {
        $visit = [];
        $queue = [];

        for ($r = 0; $r < count($rooms); $r++) {
            for ($c = 0; $c < count($rooms[0]); $c++) {
                if ($rooms[$r][$c] === 0) {
                    array_push($queue, [$r, $c]);
                    $visit["$r-$c"] = true;
                }
            }
        }

        $distance = 0;
        while (!empty($queue)) {
            $lenght = count($queue);
            for ($i = 0; $i < $lenght; $i++) {
                [$r, $c] = array_shift($queue);
                $rooms[$r][$c] = $distance;

                $this->add_rooms($r + 1, $c, $rooms, $visit, $queue);
                $this->add_rooms($r - 1, $c, $rooms, $visit, $queue);
                $this->add_rooms($r, $c + 1, $rooms, $visit, $queue);
                $this->add_rooms($r, $c - 1, $rooms, $visit, $queue);
            }
            $distance++;
        }
    }

    function add_rooms(int $r, int $c, array &$rooms, array $visit, array $queue): void
    {
        if (
            $r < 0 ||
            $c < 0 ||
            $r >= count($rooms) ||
            $c >= count($rooms[0]) ||
            array_key_exists("$r-$c", $visit) ||
            $rooms[$r][$c] === -1
        ) {
            return;
        }

        $visit["$r-$c"] = true;
        array_push($queue, [$r, $c]);
    }
}