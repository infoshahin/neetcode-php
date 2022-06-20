<?php

// URL: https://leetcode.com/problems/set-matrix-zeroes/

class Solution
{

    /**
     * @param int[][] $matrix
     */
    function setZeroes(array &$matrix): void
    {
        $rowsToZero = [];
        $columnsToZero = [];

        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                if ($matrix[$i][$j] === 0) {
                    $rowsToZero[] = $i;
                    $columnsToZero[] = $j;
                }
            }
        }

        foreach ($rowsToZero as $row) {
            for ($i = 0; $i < count($matrix[$row]); $i++) {
                $matrix[$row][$i] = 0;
            }
        }

        foreach ($columnsToZero as $column) {
            for ($i = 0; $i < count($matrix); $i++) {
                $matrix[$i][$column] = 0;
            }
        }
    }
}