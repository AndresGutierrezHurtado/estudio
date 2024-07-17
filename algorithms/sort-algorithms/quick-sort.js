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

// Descripción: También es un algoritmo de divide y vencerás. Selecciona un elemento como pivote y particiona la lista en dos partes, una con elementos menores al pivote y otra con elementos mayores, luego ordena las dos partes recursivamente.
// Uso: Muy eficiente en la práctica para listas grandes. Puede optimizarse con estrategias de elección de pivote.
