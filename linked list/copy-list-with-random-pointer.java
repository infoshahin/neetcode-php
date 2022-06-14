// URL: https://leetcode.com/problems/copy-list-with-random-pointer/

/*
 * Solving this with PHP was not possible, because of weird runtime error-
 * 
 * Line 176: PHP Fatal error:  Uncaught TypeError: spl_object_hash(): Argument #1 ($object) must be of type object, null given in solution.php
 *   Stack trace:
 *   #0 solution.php: spl_object_hash()
 *   #1 {main}
 */

import java.util.HashMap;
import java.util.Map;

// Definition for a Node.
class Node {
    int val;
    Node next;
    Node random;

    public Node(int val) {
        this.val = val;
        this.next = null;
        this.random = null;
    }
}

class Solution {
    public Node copyRandomList(Node head) {
        if (head == null)
            return null;

        Map<Node, Node> map = new HashMap<Node, Node>();

        // copy all the nodes with value
        Node current = head;
        while (current != null) {
            map.put(current, new Node(current.val));
            current = current.next;
        }

        // assign next and random pointer
        current = head;
        while (current != null) {
            map.get(current).next = map.get(current.next);
            map.get(current).random = map.get(current.random);

            current = current.next;
        }

        return map.get(head);
    }
}