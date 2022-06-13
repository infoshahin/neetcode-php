<?php

// URL: https://leetcode.com/problems/min-stack/

class MinStack
{
    private array $stack;

    function __construct()
    {
        $this->stack = [];
    }

    /**
     * @return NULL
     */
    function push(int $val)
    {
        $this->stack[] = $val;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->stack);
    }

    function top(): int
    {
        return $this->stack[array_key_last($this->stack)];
    }

    function getMin(): int
    {
        return min($this->stack);
    }
}

/*
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */