<?php

class Solution {

    /**
     * Finds the longest palindromic substring in a given string.
     * @param String $s The input string.
     * @return String The longest substring that is a palindrome.
     */
    function longestPalindrome(string $s): string {
        // If the string is empty or has only one character, it's already a palindrome.
        if (strlen($s) < 1) {
            return "";
        }

        // These variables will hold the start index and length of the longest palindrome found so far.
        $start = 0;
        $maxLength = 1;

        // Iterate through the string, considering each character as a potential center of a palindrome.
        for ($i = 0; $i < strlen($s); $i++) {
            // Case 1: Find the longest odd-length palindrome with center at $i.
            // Example: "racecar", center is 'e'.
            $len1 = $this->expandAroundCenter($s, $i, $i);

            // Case 2: Find the longest even-length palindrome with center between $i and $i+1.
            // Example: "abba", center is between 'b' and 'b'.
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);

            // Find the maximum length from the two cases.
            $len = max($len1, $len2);

            // If we found a new longest palindrome, update our tracking variables.
            if ($len > $maxLength) {
                $maxLength = $len;
                // Calculate the new start index based on the current center and new length.
                $start = $i - (int)(($len - 1) / 2);
            }
        }

        // Return the longest palindromic substring using the final start and length.
        return substr($s, $start, $maxLength);
    }

    /**
     * A helper function to find the length of a palindrome by expanding from a center.
     * @param string $s The input string.
     * @param int $left The left pointer of the center.
     * @param int $right The right pointer of the center.
     * @return int The length of the palindrome found.
     */
    private function expandAroundCenter(string $s, int $left, int $right): int {
        // Expand outwards from the center as long as the pointers are in bounds
        // and the characters at the pointers match.
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $left--;
            $right++;
        }
        // Return the total length of the palindrome found.
        // The final positions are one step past the palindrome, so we calculate length as R - L - 1.
        return $right - $left - 1;
    }
}