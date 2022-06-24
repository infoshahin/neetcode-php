<?php

// URL: https://leetcode.com/problems/find-median-from-data-stream/

class MedianFinder
{
    private $low;
    private $high;

    function __construct()
    {
        $this->low = new SplMaxHeap();
        $this->high = new SplMinHeap();
    }

    function addNum(int $num): void
    {
        $this->high->insert($num);
        $this->low->insert($this->high->extract());

        if ($this->low->count() > $this->high->count() + 1) {
            $this->high->insert($this->low->extract());
        }
    }

    function findMedian(): Float
    {
        if ($this->totalCount() % 2 !== 0) {
            return (float) $this->low->top();
        }

        return (float) ((int) $this->low->top() + (int) $this->high->top()) / 2;
    }

    function totalCount(): int
    {
        return $this->high->count() + $this->low->count();
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */