function bubbleSort(array) {
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

// Descripción: Es un algoritmo de ordenación simple que recorre repetidamente la lista, comparando y cambiando de posición elementos adyacentes si están en el orden incorrecto.
// Uso: Adecuado para listas pequeñas o cuando se necesita un algoritmo simple para implementar rápidamente. No es eficiente para listas grandes.