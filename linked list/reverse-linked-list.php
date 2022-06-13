<?php

// URL: https://leetcode.com/problems/reverse-linked-list/

class ListNode
{
    public $val = 0;
    public $next = null;
    
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    function reverseList(?ListNode $head): ?ListNode
    {
        if ($head == null) return $head;

        $prev = null;
        while ($head !== null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }

        return $prev;
    }
}