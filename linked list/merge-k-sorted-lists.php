<?php

// URL: https://leetcode.com/problems/merge-k-sorted-lists/

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
     * @param ListNode[] $lists
     */
    function mergeKLists(array $lists): ListNode
    {
        $values = [];
        foreach ($lists as $list) {
            while ($list !== null) {
                $values[] = $list->val;
                $list = $list->next;
            }
        }
        sort($values);

        $head = $current = new ListNode($values[0]);
        for ($i = 1; $i < count($values); $i++) {
            $current->next = new ListNode($values[$i]);
            $current = $current->next;
        }

        return $head;
    }
}