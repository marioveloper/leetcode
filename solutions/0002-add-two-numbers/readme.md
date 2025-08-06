# 2. Add Two Numbers

**Link to the problem:** [https://leetcode.com/problems/add-two-numbers/](https://leetcode.com/problems/add-two-numbers/)

---

### **Problem Analysis**

We are given two non-empty **singly-linked lists**, `l1` and `l2`, where each node contains a single digit. These digits represent a non-negative integer, but they are stored in **reverse order**. Our goal is to add these two numbers together and return the result as a new linked list, also in reverse order.

For example, the list `2 -> 4 -> 3` represents the number 342.

---

### **Solution Approach**

The problem asks us to perform addition much like we would on paper. Since the digits are in reverse order, the head of each list represents the least significant digit (the "ones" place). This is convenient because addition starts from the least significant digit.

We will iterate through both lists simultaneously, adding the digits at each position along with a **carry** from the previous position.

**Algorithm:**

1. Initialize a **dummy head node** (`dummyHead`) for our result list. This simplifies the code by providing a fixed starting point. A `current` pointer will track the end of our new list.

2. Initialize a `carry` variable to `0`.

3. Loop as long as `l1` is not null, `l2` is not null, or there is a remaining `carry`. This ensures we process all digits and the final carry-over.

4. In each iteration, calculate the `sum` of the current digits from `l1` and `l2` (if they exist) plus the `carry`.

5. Update the `carry` for the next iteration by calculating `sum / 10`.

6. The value for the new node will be the last digit of the `sum`, which is `sum % 10`.

7. Create this new node, attach it to `current.next`, and then advance the `current` pointer to this new node.

8. Advance `l1` and `l2` to their next nodes if they are not null.

9. Once the loop finishes, the complete result list will be `dummyHead.next`.

---

### **Complexity**

- **Time Complexity: O(max(m,n))**

    - We traverse both lists once. The loop runs for a number of iterations equal to the length of the longer list (`m` or `n`), plus one extra iteration if there's a final carry.

- **Space Complexity: O(max(m,n))**

    - The space required is for the new linked list we create. In the worst case, its length will be max(m,n)+1 (if the sum results in an extra digit).