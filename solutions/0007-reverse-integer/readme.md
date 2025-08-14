# 7. Reverse Integer

**Link to the problem:** [https://leetcode.com/problems/reverse-integer/](https://leetcode.com/problems/reverse-integer/)

---

### **Problem Analysis**

The goal is to reverse the digits of a given 32-bit signed integer. A key constraint is handling potential **integer overflow**. If the reversed number exceeds the 32-bit signed integer range (from $-2^{31}$ to $2^{31} - 1$), the function must return `0`. The sign of the original number must be preserved.

---

### **Solution Approach**

The solution involves iteratively building the reversed integer digit by digit. We can extract the last digit of the input number using the modulo (`%`) operator and append it to our result.

The most critical part is checking for overflow **before** we append the next digit, as the intermediate result `reversed * 10 + digit` might already be too large to store.

**Algorithm:**

1.  Initialize a `reversed` variable to `0`.
2.  Use a `while` loop that continues as long as the input `x` is not `0`.
3.  Inside the loop:
    * Pop the last digit from `x` using `digit = x % 10`.
    * Remove the last digit from `x` using integer division `x = x / 10`.
    * **Check for overflow:** Before appending the digit, we check if `reversed` is already on the brink of overflowing.
        * For positive numbers, if `reversed > INT_MAX / 10`, it will definitely overflow.
        * For negative numbers, if `reversed < INT_MIN / 10`, it will definitely overflow.
        * Edge cases for the last digit also need to be checked (e.g., if `reversed == INT_MAX / 10`).
    * If no overflow will occur, append the digit to the result: `reversed = reversed * 10 + digit`.
4.  Return the `reversed` number.

---

### **Complexity**

* **Time Complexity: $O(\log_{10}(n))$**
    * The number of loop iterations is equal to the number of digits in the input integer `n`. The number of decimal digits in `n` is given by $\log_{10}(n)$.

* **Space Complexity: $O(1)$**
    * The algorithm uses a constant amount of extra space for variables, regardless of the size of the input integer.