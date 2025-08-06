<?php
/**
 * Definition for a singly-linked list.
 * This class represents a single node in a linked list.
 */
class ListNode {
    /** @var int The value stored in the node. */
    public $val = 0;
    /** @var ListNode|null A reference to the next node in the list. */
    public $next = null;

    /**
     * Constructor for the ListNode.
     * @param int $val The initial value of the node.
     * @param ListNode|null $next The next node in the sequence.
     */
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * Adds two numbers represented by linked lists.
     * @param ListNode|null $l1 The head of the first linked list.
     * @param ListNode|null $l2 The head of the second linked list.
     * @return ListNode|null The head of the resulting linked list.
     */
    function addTwoNumbers($l1, $l2) {
        // Create a dummy head node. This simplifies the code by providing a
        // fixed starting point for the result list, avoiding edge cases for list initialization.
        $dummyHead = new ListNode();

        // 'current' will be used to build the new list by pointing to the last node.
        $current = $dummyHead;

        // 'carry' stores the value that is carried over to the next digit's calculation (e.g., in 8 + 7 = 15, 1 is the carry).
        $carry = 0;

        // Loop until both lists are fully traversed and there is no remaining carry.
        while ($l1 !== null || $l2 !== null || $carry > 0) {
            // Start the sum for the current digit with the carry from the previous digit.
            $sum = $carry;

            // If the first list still has nodes, add its value to the sum and move to the next node.
            if ($l1 !== null) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }

            // If the second list still has nodes, add its value to the sum and move to the next node.
            if ($l2 !== null) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }

            // Calculate the new carry for the next digit. This is the integer division of the sum by 10.
            // For example, if sum is 15, floor(15 / 10) is 1.
            $carry = (int)($sum / 10);

            // The value of the new node is the remainder of the sum divided by 10 (the "units" digit).
            // For example, if sum is 15, 15 % 10 is 5.
            $current->next = new ListNode($sum % 10);

            // Move the 'current' pointer forward to the newly created node.
            $current = $current->next;
        }

        // The result list starts after the dummy head. The dummy itself is not part of the sum.
        return $dummyHead->next;
    }
}

?>