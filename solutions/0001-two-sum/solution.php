<?php

class Solution {

    /**
     * @param Integer[] $nums   The input array of integers.
     * @param Integer   $target The target sum we want to find.
     * @return Integer[]        An array containing the indices of the two numbers.
     */
    function twoSum($nums, $target) {
        // Create a hash map to store numbers we've seen and their corresponding indices.
        // The structure will be [number => index].
        $map = [];

        // Iterate through the input array, getting both the index and the value of each element.
        foreach($nums as $index => $num){
            // Calculate the complement, which is the value needed to reach the target with the current number.
            $complement = $target - $num;

            // Check if the complement already exists as a key in our map.
            // This means we have previously seen the other number that forms the pair.
            if(array_key_exists($complement, $map)){
                // If the complement is found, we have our solution.
                // Return an array with the index of the complement (retrieved from the map)
                // and the index of the current number.
                return [$map[$complement], $index];
            }

            // If the complement is not found, add the current number and its index to the map.
            // This prepares it for future iterations, in case it's the complement for a later number.
            $map[$num] = $index;
        }
    }
}

?>