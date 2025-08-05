# 1. Two Sum

**Link to the problem:** [https://leetcode.com/problems/two-sum/](https://leetcode.com/problems/two-sum/)

---

### **Problem Analysis**

The goal is to find two numbers in an array that add up to a specific value, `target`. We must return the indices of these two numbers. We are guaranteed that there will be exactly one solution and that we cannot use the same element twice.

---

### **Solution Approach**

The most intuitive way would be to use a double loop (brute force), comparing each element with all the others. This would have a time complexity of $O(n^2)$, which is inefficient for large lists.

A much more optimal approach is to use a data structure that allows for fast lookups. A Hash Map (or `Map` in JavaScript, `dict` in Python) is ideal for this. The idea is to iterate through the array only once.

**Algorithm:**

1.  Create an empty Hash Map to store the numbers we have already seen and their indices: `map[number] = index`.
2.  Iterate through the `nums` array with index `i`.
3. For each number `nums[i]`, calculate the `complement` needed to reach the `target`: `complement = target - nums[i]`.
4.  Check if the `complement` already exists as a key in our map.
    * **If exists:** We've found the solution! The value associated with `map[complement]` is the index of the first number, and the current `i` is the index of the second number. We return `[map[complement], i]`.
    * **If it doesn't exist:** We add the current number and its index to the map: `map[nums[i]] = i`. This prepares it for future iterations.

This method allows us to find the solution in a single pass.

---

### **Complexity**

* **Time Complexity: $O(n)$**
    * We traverse the list of `n` elements only once. Insertion and search operations in a hash map take an average of $O(1)$.

* **Space Complexity: $O(n)$**
    * In the worst case, we will store all `n` elements of the array in the hash map.