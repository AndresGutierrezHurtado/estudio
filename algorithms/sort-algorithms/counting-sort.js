function countingSort(array) {
    let countingArray = new Array(10).fill(0);
    let totalCounting = 0;
    let resultado = [];

    // Realiza conteo
    for (let i = 0; i < array.length; i++) {
        countingArray[array[i]] ++;
    }

    // Suma los índices
    for (let i = 0; i < countingArray.length; i++) {
        totalCounting += countingArray[i];
        countingArray[i] = totalCounting;
    }

    // Acomoda dependiendo del índice
    for (let i = 0; i < array.length; i++) {
        countingArray[array[i]] -= 1;
        let position = countingArray[array[i]];

        resultado[position] = array[i];
    }

    return resultado;
}

console.log(countingSort([1, 4, 3, 6, 7, 0, 3, 2, 5]));
