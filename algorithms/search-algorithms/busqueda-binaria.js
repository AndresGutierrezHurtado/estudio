function busquedaBinaria(array, buscar) {
    if (array.length < 0) {
        return false;
    }

    array.sort();
    
    while (array.length > 0) {

        mitad = Math.ceil(array.length / 2);

        if (array[mitad] == buscar) {
            return true;
        } else if(array[mitad] > buscar) {
            array = array.slice(0, mitad);
        } else {
            array = array.slice(mitad + 1);
        }
    }
    
    return false;
}

console.log(busquedaBinaria([1, 4, 3, 2, 8], 3));