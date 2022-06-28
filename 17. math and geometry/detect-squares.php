<?php

// URL: https://leetcode.com/problems/detect-squares/

class DetectSquares
{
    private array $points;
    private array $pointsCount;

    function __construct()
    {
        $this->points = [];
        $this->pointsCount = [];
    }

    /**
     * @param int[] $point
     */
    function add(array $point): void
    {
        $this->points[] = $point;
        [$px, $py] = $point;
        $this->pointsCount["$px-$py"]++;
    }

    /**
     * @param int[] $point
     */
    function count(array $point): int
    {
        [$px, $py] = $point;

        $result = 0;
        foreach ($this->points as $p) {
            [$x, $y] = $p;
            if ((abs($py - $y) !== abs($px - $x)) || $x === $px || $y === $py) {
                continue;
            }

            $result += $this->pointsCount["$x-$py"] * $this->pointsCount["$px-$y"];
        }

        return $result;
    }
}

/**
 * Your DetectSquares object will be instantiated and called as such:
 * $obj = DetectSquares();
 * $obj->add($point);
 * $ret_2 = $obj->count($point);
 */