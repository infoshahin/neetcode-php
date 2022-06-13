<?php

// URL: https://leetcode.com/problems/plus-one/

class SolutionUsingStringManipulationWithBcMath
{
    /**
     * @param int[] $digits
     * @return int[] 
     */
    function plusOne(array $digits): array
    {
        $number = '';
        foreach ($digits as $digit) {
            $number .= $digit;
        }

        $result = bcadd($number, '1');

        return str_split($result);
    }
}

class SolutionUsingAddingInterger
{
    /**
     * @param int[] $digits
     * @return int[] 
     */
    function plusOne(array $digits): array
    {
        $lastDigit = $digits[array_key_last($digits)] + 1;

        $carry = $lastDigit >= 10;
        $lastDigit = $lastDigit % 10;

        $digits[array_key_last($digits)] = $lastDigit;

        for ($i = count($digits) - 2; $i >= 0; $i--) {
            $digit = $digits[$i] + (int) $carry;
            $carry = $digit >= 10;
            $digit = $digit % 10;

            $digits[$i] = $digit;
        }

        if ($carry) {
            array_unshift($digits, 1);
        }

        return $digits;
    }
}