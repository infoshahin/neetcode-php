<?php

// URL: https://leetcode.com/problems/rotting-oranges/

class Solution
{
    /**
     * @param integer[][] $grid
     */
    function orangesRotting(array $grid): int
    {
        $rows = count($grid);
        if ($rows === 0) return -1;
        $columns = count($grid[0]);

        $freshCount = 0;
        $rotten = [];
        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $columns; $c++) {
                if ($grid[$r][$c] === 2) {
                    $rotten[] = [$r, $c];
                } else if ($grid[$r][$c] === 1) {
                    $freshCount++;
                }
            }
        }

        $minutePassed = 0;
        while (!empty($rotten) && $freshCount > 0
        ) {
            $minutePassed++;

            $tempRottenCount = count($rotten);
            for ($i = 0; $i < $tempRottenCount; $i++) {
                $rot = array_shift($rotten);
                [$r, $c] = $rot;

                foreach ([[1, 0], [-1, 0], [0, 1], [0, -1]] as $drot) {
                    [$dr, $dc] = $drot;

                    $x = $r + $dr;
                    $y = $c + $dc;

                    if (
                        $x < 0 ||
                        $x === $rows ||
                        $y < 0 ||
                        $y === $columns ||
                        $grid[$x][$y] === 0 ||
                        $grid[$x][$y] === 2
                    ) {
                        continue;
                    }

                    $freshCount--;

                    $grid[$x][$y] = 2;
                    $rotten[] = [$x, $y];
                }
            }
        }
        return ($freshCount === 0) ? $minutePassed : -1;
    }
}