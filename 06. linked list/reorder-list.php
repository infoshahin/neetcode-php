<?php

// URL: https://leetcode.com/problems/reorder-list/

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
    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList(?ListNode $head)
    {
        if ($head === null) return $head;

        // divide the list into half with 2 pointer, fast lalf will have 1 more item in case of odd number of nodes
        $slow = $head;
        $fast = $head;
        while ($fast !== null || $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // reverse the last half
        $lastHalf = $this->reverseList($slow);

        // create a reorder list with a dummy node
        $reorder = new ListNode(-1);

        $current = $reorder;
        while ($lastHalf !== null) {
            if ($slow == $head) {
                $current->next = $head;
                break;
            }

            $current->next = $head;
            $head = $head->next;
            $current = $current->next;

            $current->next = $lastHalf;
            $lastHalf = $lastHalf->next;
            $current = $current->next;
        }

        // for odd number of nodes in the input, added one more node from the first half
        if ($head->next == $slow) {
            $current->next = $head;
            $current = $current->next;
            $current->next = null;
        }

        return $reorder->next;
    }

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