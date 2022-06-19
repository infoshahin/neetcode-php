<?php

// URL: https://leetcode.com/problems/kth-largest-element-in-a-stream/

class KthLargest
{
    private $k;
    private $heap;

    /**
     * @param int[] $nums
     */
    function __construct(int $k, array $nums)
    {
        $this->k = $k;
        $this->heap = new SplMinHeap();

        foreach ($nums as $num) {
            $this->add($num);
        }
    }

    function add(int $val): int
    {
        if ($this->heap->count() < $this->k) {
            $this->heap->insert($val);
        } else if ($this->heap->top() < $val) {
            $this->heap->extract();
            $this->heap->insert($val);
        } else {
        }

        return (int) $this->heap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */