# 3. Longest Substring Without Repeating Characters

**Link to the problem:** [https://leetcode.com/problems/longest-substring-without-repeating-characters/](https://leetcode.com/problems/longest-substring-without-repeating-characters/)

---

### **Problem Analysis**

The goal is to find the length of the longest possible **substring** from a given string `s` that does not contain any repeating characters. A substring is a contiguous sequence of characters within a string.

For example, in `"abcabcbb"`, the longest substring without repeating characters is `"abc"`, so the output should be 3.

---

### **Solution Approach**

A brute-force approach would involve checking every possible substring, which is very inefficient ($O(n^3)$). A much better method is the **sliding window** technique.

This approach uses two pointers, `left` and `right`, to define a "window" (a substring). The `right` pointer expands the window, and the `left` pointer contracts it when a repeating character is found. We use a **Hash Map** to keep track of the characters currently in our window and their most recent indices.

**Algorithm:**

1.  Initialize a `left` pointer to `0` and a `maxLength` to `0`.
2.  Create an empty Hash Map (`charMap`) to store characters and their last seen indices (`char => index`).
3.  Iterate through the string with a `right` pointer from left to right.
4.  At each character (`currentChar`), check if it's already in our `charMap` and if its last seen index is within the current window's bounds (i.e., greater than or equal to `left`).
    * **If it is a repeat inside the window:** We need to shrink the window. We move the `left` pointer to the position immediately after the last occurrence of this character (`charMap[currentChar] + 1`).
    * **If it's not a repeat:** The window can continue to expand.
5.  Update the `charMap` with the `currentChar`'s current index (`right`).
6.  Calculate the length of the current valid window (`right - left + 1`) and update `maxLength` if this new length is greater.
7.  After the loop finishes, `maxLength` will hold the answer.



---

### **Complexity**

* **Time Complexity: $O(n)$**
    * We iterate through the string only once with the `right` pointer. The `left` pointer also moves forward, ensuring that each character is processed a constant number of times.

* **Space Complexity: $O(k)$**
    * The space used is for the hash map. In the worst-case scenario, it will store $k$ unique characters, where $k$ is the number of unique characters in the string or the size of the character set (e.g., ASCII, which is constant). Therefore, the complexity is proportional to the number of unique characters.