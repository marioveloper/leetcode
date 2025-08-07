<?php

class Solution {
    /**
     * Finds the length of the longest substring without repeating characters.
     * @param String $s The input string.
     * @return Integer The length of the longest substring.
     */
    function lengthOfLongestSubstring($s) {
        // Get the total length of the string.
        $n = strlen($s);
        // If the string has 0 or 1 character, the longest substring is the string itself.
        if ($n <= 1) {
            return $n;
        }
        // This will store the maximum length found so far.
        $maxLength = 0;
        // A hash map (or dictionary) to store the most recent index of each character.
        // The structure will be [character => index].
        $charMap = [];
        // 'left' pointer represents the start of the current window.
        $left = 0;
        // 'right' pointer expands the window by iterating through the string.
        for ($right = 0; $right < $n; $right++) {
            // Get the character at the current right pointer.
            $currentChar = $s[$right];
            // Check if the current character is already in our map AND if its last seen
            // position is within the current window (i.e., its index is >= left).
            if (isset($charMap[$currentChar]) && $charMap[$currentChar] >= $left) {
                // If it is a repeat within the window, we must shrink the window.
                // Move the left pointer to the position right after the last occurrence
                // of the current character to start a new, valid window.
                $left = $charMap[$currentChar] + 1;
            }
            // Update the map with the latest index of the current character.
            // This is done for every character, regardless of whether it was a repeat or not.
            $charMap[$currentChar] = $right;
            // Calculate the length of the current valid window.
            $currentLength = $right - $left + 1;
            // Update the overall maximum length if the current window is longer.
            $maxLength = max($maxLength, $currentLength);
        }
        // Return the maximum length found during the iteration.
        return $maxLength;
    }
}
?>