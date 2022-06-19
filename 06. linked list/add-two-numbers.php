<?php

// URL: https://leetcode.com/problems/add-two-numbers/

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
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $l1Value = $this->getValueFromList($l1);
        $l2Value = $this->getValueFromList($l2);

        $sum = (string) bcadd($l1Value, $l2Value);

        $listNode = new ListNode($sum[0], null);
        for ($i = 1; $i < strlen($sum); $i++) {
            $listNode = new ListNode($sum[$i], $listNode);
        }

        return $listNode;
    }

    function getValueFromList($listNode): string
    {
        $valueReverse = '';
        while ($listNode !== null) {
            $valueReverse .= $listNode->val;
            $listNode = $listNode->next;
        }

        return strrev($valueReverse);
    }
}