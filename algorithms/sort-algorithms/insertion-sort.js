function insertionSort(array) {
    // recorre el array y si el elemento anterior es mayor lo intercambia
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
