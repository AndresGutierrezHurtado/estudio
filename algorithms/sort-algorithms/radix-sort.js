function countingSort(array, exp) {
    let countingArray = new Array(10).fill(0);
    let resultado = new Array(array.length);
    let n = array.length;

    for (let i = 0; i < n; i++) {
        let index = Math.floor(array[i] / exp) % 10;
        countingArray[index]++;
    }

    for (let i = 1; i < 10; i++) {
        countingArray[i] += countingArray[i - 1];
    }

    for (let i = n - 1; i >= 0; i--) {
        let index = Math.floor(array[i] / exp) % 10;
        resultado[countingArray[index] - 1] = array[i];
        countingArray[index]--;
    }

    for (let i = 0; i < n; i++) {
        array[i] = resultado[i];
    }
}

function radixSort(array) {
    let max = Math.max(...array);

    for (let exp = 1; Math.floor(max / exp) > 0; exp *= 10) {
        countingSort(array, exp);
    }

    return array;
}

console.log(radixSort([170, 45, 75, 90, 802, 24, 2, 66]));

// Descripción: Ordena los números digit by digit comenzando desde el dígito menos significativo al más significativo utilizando un algoritmo de ordenación estable (como Counting Sort).
// Uso: Eficiente para listas de números enteros con un rango limitado de dígitos. No es comparativo y puede ser más rápido que 𝑂(𝑛 log 𝑛) en algunos casos.