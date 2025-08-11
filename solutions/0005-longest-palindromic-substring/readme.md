# 5. Longest Palindromic Substring

**Link to the problem:** [https://leetcode.com/problems/longest-palindromic-substring/](https://leetcode.com/problems/longest-palindromic-substring/)

---

### **Problem Analysis**

The task is to find the longest **substring** within a given string `s` that is also a **palindrome**. A palindrome is a sequence that reads the same forwards and backward (e.g., "madam" or "racecar"). The substring must be a contiguous block of characters.

---

### **Solution Approach**

While a brute-force check of all possible substrings is too slow, a very efficient and common method is the **"Expand Around Center"** technique. This approach is based on the idea that any palindrome has a center from which it expands symmetrically.

There are `2n - 1` potential centers in a string of length `n`: `n` single-character centers (for odd-length palindromes like "aba") and `n - 1` centers between characters (for even-length palindromes like "abba").



**Algorithm:**

1.  Initialize variables to track the `start` index and `maxLength` of the longest palindrome found so far.
2.  Iterate through the input string `s` with an index `i` from `0` to `n-1`.
3.  For each index `i`, treat it as the center and check for two possibilities:
    * **Odd-length palindrome:** Find the length of the palindrome centered at `i` (e.g., `expandAroundCenter(s, i, i)`).
    * **Even-length palindrome:** Find the length of the palindrome centered between `i` and `i+1` (e.g., `expandAroundCenter(s, i, i + 1)`).
4.  If the length found in either case is greater than the current `maxLength`, update `maxLength` and calculate the new `start` index.
5.  After iterating through all possible centers, use the final `start` and `maxLength` to extract the longest palindromic substring from `s`.

---

### **Complexity**

* **Time Complexity: $O(n^2)$**
    * We iterate through the string once ($O(n)$). For each character, we might expand outwards up to `n/2` times in both directions, leading to a nested $O(n)$ operation.

* **Space Complexity: $O(1)$**
    * This algorithm uses only a constant amount of extra space for variables like `start` and `maxLength`, regardless of the input string's size.