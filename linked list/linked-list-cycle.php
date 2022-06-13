<?php

// URL: https://leetcode.com/problems/linked-list-cycle/

class SolutionByChangingTheValue
{
    function hasCycle(?ListNode $head): bool
    {
        while ($head !== null) {
            if ($head->val == 'visited'
            ) {
                return true;
            }
            $head->val = 'visited';
            $head = $head->next;
        }

        return false;
    }
}

class SolutionUsingTwoPointerWithDifferentSpeed
{
    function hasCycle(?ListNode $head): bool
    {
        if ($head === null) return false;

        $slow = $head;
        $fast = $head->next;
        while ($slow !== $fast) {
            if ($fast === null || $fast->next === null) {
                return false;
            }

            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return true;
    }
}

// storing using array will throw "PHP Fatal error:  Nesting level too deep - recursive dependency"
class SolutionByStoringAllTheVisitedNodeInObjectStorage
{
    function hasCycle(?ListNode $head): bool
    {
        if ($head === null) return false;

        $store = new SplObjectStorage();
        while ($head !== null) {
            if ($store->contains($head)) {
                return true;
            }

            $store->attach($head);
            $head = $head->next;
        }

        return false;
    }
}