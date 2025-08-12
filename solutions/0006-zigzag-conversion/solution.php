<?php

class Solution {

    /**
     * Converts a string into a zigzag pattern on a given number of rows.
     * @param String $s The input string.
     * @param Integer $numRows The number of rows for the zigzag pattern.
     * @return String The string, read line by line from the zigzag pattern.
     */
    function convert(string $s, int $numRows): string {
        // If there's only one row, or enough rows for each character,
        // the string doesn't change. This is a crucial edge case.
        if ($numRows == 1 || $numRows >= strlen($s)) {
            return $s;
        }

        // Create an array to hold the characters for each row.
        $rows = array_fill(0, $numRows, '');

        // 'currentRow' tracks which row we are currently adding characters to.
        $currentRow = 0;
        
        // 'goingDown' determines the direction of movement (down or up the rows).
        $goingDown = false;

        // Iterate through each character of the input string.
        for ($i = 0; $i < strlen($s); $i++) {
            // Append the current character to its corresponding row.
            $rows[$currentRow] .= $s[$i];

            // If we are at the top or bottom row, we need to reverse direction.
            if ($currentRow == 0 || $currentRow == $numRows - 1) {
                $goingDown = !$goingDown;
            }

            // Move to the next row based on the current direction.
            // If goingDown is true, increment currentRow; otherwise, decrement it.
            $currentRow += $goingDown ? 1 : -1;
        }

        // Finally, combine all the rows into a single string and return it.
        return implode('', $rows);
    }
}