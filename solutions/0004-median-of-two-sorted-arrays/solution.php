<?php

class Solution {

    /**
     * Finds the median of two sorted arrays.
     * @param int[] $nums1 The first sorted array.
     * @param int[] $nums2 The second sorted array.
     * @return float The median of the two sorted arrays.
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float {
        // Ensure nums1 is the smaller array to optimize the binary search.
        if (count($nums1) > count($nums2)) {
            return $this->findMedianSortedArrays($nums2, $nums1);
        }

        $m = count($nums1);
        $n = count($nums2);

        // 'low' and 'high' are for the binary search on the smaller array (nums1).
        $low = 0;
        $high = $m;

        while ($low <= $high) {
            // partitionX is the split point in the smaller array (nums1).
            $partitionX = (int)(($low + $high) / 2);

            // partitionY is the corresponding split point in the larger array (nums2).
            // The total number of elements in the left partitions of both arrays
            // should be (m + n + 1) / 2 for the median property to hold.
            $partitionY = (int)(($m + $n + 1) / 2) - $partitionX;

            // --- Define the four boundary elements that determine the median ---

            // maxLeftX is the largest element in the left partition of nums1.
            // If the partition is empty, use negative infinity as a placeholder.
            $maxLeftX = ($partitionX == 0) ? -INF : $nums1[$partitionX - 1];

            // minRightX is the smallest element in the right partition of nums1.
            // If the partition includes everything, use positive infinity.
            $minRightX = ($partitionX == $m) ? INF : $nums1[$partitionX];

            // maxLeftY is the largest element in the left partition of nums2.
            $maxLeftY = ($partitionY == 0) ? -INF : $nums2[$partitionY - 1];

            // minRightY is the smallest element in the right partition of nums2.
            $minRightY = ($partitionY == $n) ? INF : $nums2[$partitionY];

            // --- Check if we found the correct partitions ---

            // The correct partition is found if the largest element on the left side
            // of the combined partition is less than or equal to the smallest element
            // on the right side.
            if ($maxLeftX <= $minRightY && $maxLeftY <= $minRightX) {
                // If the total number of elements is even...
                if (($m + $n) % 2 == 0) {
                    // The median is the average of the two middle elements.
                    // These are the maximum of the left partitions and the minimum of the right partitions.
                    return (max($maxLeftX, $maxLeftY) + min($minRightX, $minRightY)) / 2.0;
                } else {
                    // If the total number of elements is odd...
                    // The median is the single middle element, which is the maximum of the left partitions.
                    return (float)max($maxLeftX, $maxLeftY);
                }
            } elseif ($maxLeftX > $minRightY) {
                // If the left element from nums1's partition is too large,
                // it means our partition in nums1 is too far to the right.
                // We need to move the partition left.
                $high = $partitionX - 1;
            } else {
                // If the left element from nums2's partition is too large,
                // it means our partition in nums1 is too far to the left.
                // We need to move the partition right.
                $low = $partitionX + 1;
            }
        }

        // This line should not be reached if inputs are valid sorted arrays.
        // It's here to satisfy return type requirements.
        throw new InvalidArgumentException("Input arrays are not sorted or are invalid.");
    }
}