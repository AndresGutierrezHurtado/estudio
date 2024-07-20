function quickSort(array) {
    // caso base
    if (array.length <= 1) {
        return array;
    }

    // declara variables pointer y pivot
    let pivotIndex = Math.floor(array.length / 2);
    let pivot = array[pivotIndex];

    let leftArray = [];
    let rightArray = [];
    
    // ordenar array
    for (let i = 0; i < array.length; i++) {
        if (i !== pivotIndex) {
            if (array[i] < pivot) {
                leftArray.push(array[i]);
            } else {
                rightArray.push(array[i]);
            }
        }
    }

    leftArray = quickSort(leftArray);
    rightArray = quickSort(rightArray);

    return leftArray.concat([pivot], rightArray);
}

console.log(quickSort([3, 5, 1, 8, 4, 3, 2, 0]));
