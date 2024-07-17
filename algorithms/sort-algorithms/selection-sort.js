function selectionSort(array) {
    
    for (let i = 0; i < array.length; i++) {
        let menorIndex = i;
        let llave = array[i];

        for (let j =  i+1; j < array.length; j++) {
            if (array[j] < array[menorIndex]) {
                menorIndex = j;
            }
        }
        
        array[i] = array[menorIndex];
        array[menorIndex] = llave;
    }

    return array;
}

console.log(selectionSort([1, 4, 3, 6, 7, 0, 3, 2, 5, -4]));

// Descripción: Encuentra repetidamente el elemento mínimo de la parte no ordenada de la lista y lo mueve al final de la parte ordenada.
// Uso: Simple de entender e implementar, pero no eficiente para listas grandes. Útil para situaciones donde la simplicidad es más importante que la eficiencia.