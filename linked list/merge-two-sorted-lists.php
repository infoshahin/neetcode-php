<?php

// URL: https://leetcode.com/problems/merge-two-sorted-lists/

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0,
        $next = null
    ) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    function mergeTwoLists(?ListNode $list1, ?ListNode $list2): ?ListNode
    {
        if (empty($list1)) {
            return $list2;
        } else if (empty($list2)) {
            return $list1;
        } else if ($list1->val >= $list2->val) {
            $list2->next = $this->mergeTwoLists($list1, $list2->next);
            return $list2;
        } else {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        }
    }
}