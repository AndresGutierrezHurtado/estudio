function maxSum(arr) {
    const sortedArray = arr.sort((a, b) => b - a);

    return sortedArray[0] + sortedArray[1];
}

// Tests
console.log(maxSum([4, 5, 2, 4, 2, 5, 7, 8, 3])); // 15
console.log(maxSum([1, 2, 3, 4, 5])); // 9
console.log(maxSum([-10, -20, -3, -4])); // -7
console.log(maxSum([100, 99])); // 199
console.log(maxSum([0, 0, 0, 0])); // 0
console.log(maxSum([5, 5])); // 10
