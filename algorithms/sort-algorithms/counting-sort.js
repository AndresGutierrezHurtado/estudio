function countingSort(array) {
    let countingArray = new Array(10).fill(0);
    let totalCounting = 0;
    let resultado = [];

    for (let i = 0; i < array.length; i++) {
        countingArray[array[i]] ++;
    }

    for (let i = 0; i < countingArray.length; i++) {
        totalCounting += countingArray[i];
        countingArray[i] = totalCounting;
    }

    for (let i = 0; i < array.length; i++) {
        countingArray[array[i]] -= 1;
        let position = countingArray[array[i]];

        resultado[position] = array[i];

    }

    return resultado;
}

console.log(countingSort([1, 4, 3, 6, 7, 0, 3, 2, 5]));

// Descripción: Es un algoritmo de ordenación que asume que los elementos de la lista son números enteros en un rango pequeño. Cuenta la cantidad de ocurrencias de cada valor y luego calcula las posiciones de los elementos.
// Uso: Eficiente para listas donde los elementos tienen un rango limitado y no es comparativo. No es adecuado para listas con un rango de valores muy amplio o no enteros.
