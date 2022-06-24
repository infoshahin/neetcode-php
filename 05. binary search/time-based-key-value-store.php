<?php

// URL: https://leetcode.com/problems/time-based-key-value-store/

class TimeMap
{
    private array $map;

    function __construct()
    {
        $this->map = [];
    }

    function set(string $key, string $value, int $timestamp): void
    {
        $this->map[$key][] = [$timestamp, $value];
    }

    function get(string $key, int $timestamp): string
    {
        if (!array_key_exists($key, $this->map)) {
            return "";
        }

        return $this->binarySearch($timestamp, $this->map[$key]);
    }

    function binarySearch(int $target, array $list): string
    {
        $low = 0;
        $high = count($list) - 1;

        while ($low <= $high) {
            $mid = (int) (($low + $high) / 2);

            if ($list[$mid][0] === $target) {
                return $list[$mid][1];
            }

            if ($list[$mid][0] > $target) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return $list[$high][1] ?? '';
    }
}

/**
 * Your TimeMap object will be instantiated and called as such:
 * $obj = TimeMap();
 * $obj->set($key, $value, $timestamp);
 * $ret_2 = $obj->get($key, $timestamp);
 */