function bubbleSort(array) {
    // recorrer el array y si el siguiente elemento es menor, intercambiarlos.
    for (let i = 0; i < array.length; i++) {
        for (let j = 0; j < array.length; j++) {
            if (array[j] > array[j + 1]) {
                let key = array[j];

                array[j] = array[j+1];
                array[j+1] = key;
            }
        }
    }

    return array;
}

console.log(bubbleSort([1,5,3,7,9,3,0,-1]));
