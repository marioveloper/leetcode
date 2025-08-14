<?php

class Solution {

    /**
     * Reverses the digits of a 32-bit signed integer.
     * @param Integer $x The integer to reverse.
     * @return Integer The reversed integer, or 0 if the result overflows.
     */
    function reverse(int $x): int {
        // Define the boundaries for a 32-bit signed integer.
        // INT_MAX is typically 2147483647 on 64-bit PHP, but we need the 32-bit value.
        $intMax = 2**31 - 1; // 2147483647
        $intMin = -(2**31);   // -2147483648

        $reversed = 0;

        // Loop until the original number becomes 0.
        while ($x != 0) {
            // Get the last digit of x using the modulo operator.
            // fmod is used to handle the negative case correctly in PHP.
            $digit = (int)fmod($x, 10);

            // Remove the last digit from x.
            $x = (int)($x / 10);

            // --- Check for potential overflow BEFORE it happens ---

            // Check for positive overflow.
            // If reversed > INT_MAX / 10, then reversed * 10 + digit will surely overflow.
            // If reversed == INT_MAX / 10, we must check if the new digit is greater than 7.
            if ($reversed > $intMax / 10 || ($reversed == (int)($intMax / 10) && $digit > 7)) {
                return 0;
            }

            // Check for negative overflow.
            // If reversed < INT_MIN / 10, then reversed * 10 + digit will surely underflow.
            // If reversed == INT_MIN / 10, we must check if the new digit is less than -8.
            if ($reversed < $intMin / 10 || ($reversed == (int)($intMin / 10) && $digit < -8)) {
                return 0;
            }

            // Append the digit to the reversed number.
            $reversed = $reversed * 10 + $digit;
        }

        return $reversed;
    }
}