# 6. Zigzag Conversion

**Link to the problem:** [https://leetcode.com/problems/zigzag-conversion/](https://leetcode.com/problems/zigzag-conversion/)

-----

### **Problem Analysis**

The problem asks us to rearrange the characters of a given string, `s`, into a zigzag pattern with a specified number of rows, `numRows`. After the characters are laid out in this pattern, they are read line by line from top to bottom to produce the final output string.

For example, with `numRows = 3`, the string "PAYPALISHIRING" is arranged like this:

```
P   A   H   N
A P L S I I G
Y   I   R
```

Reading it line by line gives: "PAHNAPLSIIGYIR".

-----

### **Solution Approach**

A direct and intuitive way to solve this is by **simulating the character placement**. We can determine which row each character belongs to by tracking our position and direction within the zigzag pattern.

**Algorithm:**

1.  Handle the edge case where `numRows` is `1`, as no conversion is needed.
2.  Create an array of strings (let's call it `rows`), where each string will hold the characters for one row of the pattern.
3.  Initialize a `currentRow` pointer to `0` and a boolean flag, `goingDown`, to track the vertical direction of movement.
4.  Iterate through each character of the input string `s`.
5.  For each character, append it to the string at the `currentRow` in our `rows` array.
6.  If the `currentRow` is either the top row (`0`) or the bottom row (`numRows - 1`), flip the `goingDown` direction flag.
7.  Update the `currentRow` by adding `1` if `goingDown` is true, or subtracting `1` if it's false.
8.  After the loop finishes, all characters will be in their correct rows. Simply join the strings in the `rows` array to get the final result.

-----

### **Complexity**

  * **Time Complexity: $O(n)$**

      * We iterate through the input string of length `n` exactly once to place each character.

  * **Space Complexity: $O(n)$**

      * The total space required is for the `rows` array, which, in total, stores all `n` characters of the original string.