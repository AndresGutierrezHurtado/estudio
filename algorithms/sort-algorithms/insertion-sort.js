function insertionSort(array) {
    for (let i = 0; i < array.length; i++) {
        let key = array[i];
        
        let indice = i - 1;
        while (indice >= 0 && key < array[indice]) {
            array[indice + 1] = array[indice]
            array[indice] = key;
            
            indice -= 1;
        }
    }
    
    return array;
}

console.log(insertionSort([1, 4, 3, 6, 7, 0, 3, 2, 5, -4]));

// Descripción: Ordena la lista construyendo la lista ordenada uno a uno. Toma cada elemento y lo inserta en la posición correcta dentro de los elementos ya ordenados.
// Uso: Eficiente para listas pequeñas o casi ordenadas. Fácil de implementar y eficiente en casos específicos.