# 4. Median of Two Sorted Arrays

**Link to the problem:** [https://leetcode.com/problems/median-of-two-sorted-arrays/](https://leetcode.com/problems/median-of-two-sorted-arrays/)

---

### **Problem Analysis**

Given two sorted arrays, `nums1` and `nums2`, the task is to find the median of the combined, notionally sorted array. A key constraint is that the algorithm must have a time complexity of $O(\log(m+n))$, which rules out the straightforward approach of merging the two arrays and finding the middle element (that would be $O(m+n)$).

The median is the middle value in an ordered dataset. If the dataset has an odd number of values, the median is the single middle number. If it has an even number, the median is the average of the two middle numbers.

---

### **Solution Approach**

To meet the logarithmic time complexity requirement, a **binary search** algorithm is necessary. The core idea is not to search for a value, but to find the correct **partition** in both arrays that separates the combined elements into a "left half" and a "right half".

For a partition to be correct, every element in the combined left half must be less than or equal to every element in the combined right half. We will perform the binary search on the smaller of the two arrays to optimize performance.

**Algorithm:**

1.  Ensure `nums1` is the smaller array. If not, swap them. This minimizes the search space for our binary search.
2.  Perform a binary search on `nums1` (the smaller array). The search space is from index `0` to `m` (the length of `nums1`).
3.  In each iteration, we find a `partitionX` in `nums1`. Based on this, we calculate `partitionY` in `nums2` such that the total number of elements in the left parts of both arrays is equal to the total in the right parts (or differs by one for an odd total).
4.  Identify the four boundary elements around the partitions:
    * `maxLeftX`: The largest element in the left part of `nums1`.
    * `minRightX`: The smallest element in the right part of `nums1`.
    * `maxLeftY`: The largest element in the left part of `nums2`.
    * `minRightY`: The smallest element in the right part of `nums2`.
5.  Check if the partition is correct by ensuring `maxLeftX <= minRightY` and `maxLeftY <= minRightX`.
    * **If correct:** We have found the median.
        * If the total number of elements is **odd**, the median is `max(maxLeftX, maxLeftY)`.
        * If the total is **even**, the median is `(max(maxLeftX, maxLeftY) + min(minRightX, minRightY)) / 2`.
    * **If incorrect** (`maxLeftX > minRightY`): Our partition in `nums1` is too large. We must move our search to the left half.
    * **If incorrect** (otherwise): Our partition in `nums1` is too small. We must move our search to the right half.



---

### **Complexity**

* **Time Complexity: $O(\log(\min(m, n)))$**
    * The algorithm's runtime is dictated by the binary search, which is performed exclusively on the smaller of the two input arrays.

* **Space Complexity: $O(1)$**
    * The algorithm uses a fixed number of variables to store pointers and boundary values. The space required does not scale with the size of the input arrays.