<?php

// URL: https://leetcode.com/problems/remove-nth-node-from-end-of-list/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

class Solution
{
    function removeNthFromEnd(ListNode $head, int $n): ?ListNode
    {
        $slow = $fast = $head;
        for ($i = 1; $i <= $n; $i++) {
            $fast = $fast->next;
        }

        if ($fast === null) {
            $head = $head->next;
            return $head;
        }

        while ($fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        $slow->next = $slow->next->next;

        return $head;
    }
}