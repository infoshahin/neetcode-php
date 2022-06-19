<?php

// URL: https://leetcode.com/problems/reverse-nodes-in-k-group/

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
    function reverseKGroup(?ListNode $head, int $k): ?ListNode
    {
        $result = null;
        $prevLast = null;

        while ($this->canReverse($head, $k)) {
            $newHead = $this->reverseSubset($head, $k);
            $result  = $result ?: $newHead;

            if ($prevLast) {
                $prevLast->next = $newHead;
            }

            $prevLast = $head;
            $head = $head->next;
        }

        return $result;
    }

    function canReverse(?ListNode $head, int $k): bool
    {
        if ($head === null) return false;

        while ($k > 1) {
            if ($head->next !== null) {
                $head = $head->next;
            } else {
                return false;
            }
            $k--;
        }

        return true;
    }

    function reverseSubset(ListNode $head, int $k): ListNode
    {
        if ($k < 2) {
            return $head;
        }

        $pointer = $head;
        for ($i = $k; $i > 1; $i--) {
            $next = $head->next;
            $oneAfterNext = $next->next;

            $next->next = $pointer;
            $head->next = $oneAfterNext;

            $pointer = $next;
        }

        return $pointer;
    }
}