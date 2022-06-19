<?php

// URL: https://leetcode.com/problems/min-stack/

// getMin has O(n) time complexity
class MinStackUsingOneStack
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

// getMin has O(1) time complexity
class MinStackUsingTwoStack
{
    private array $stack;
    private array $minStack;

    function __construct()
    {
        $this->stack = [];
        $this->minStack = [];
    }

    /**
     * @return NULL
     */
    function push(int $val)
    {
        $this->stack[] = $val;

        if (count($this->minStack) === 0) {
            $this->minStack[] = $val;
            return;
        }

        $topOfMinStack = $this->minStack[array_key_last($this->minStack)];
        if ($topOfMinStack < $val) {
            $this->minStack[] = $topOfMinStack;
        } else {
            $this->minStack[] = $val;
        }
    }

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->stack);
        array_pop($this->minStack);
    }

    function top(): int
    {
        return $this->stack[array_key_last($this->stack)];
    }

    function getMin(): int
    {
        return $this->minStack[array_key_last($this->minStack)];
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

/*
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */