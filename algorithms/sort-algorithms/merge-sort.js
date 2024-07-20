function mergeSort(array) {
    // caso base
    if (array.length == 1) {
        return array;
    }

    // divide array
    let mitad = Math.ceil(array.length / 2);
    let primeraMitad = array.slice(0, mitad);
    let segundaMitad = array.slice(mitad);
    
    // reutilidad
    primeraMitad = mergeSort(primeraMitad);
    segundaMitad = mergeSort(segundaMitad);

    return Merge(primeraMitad, segundaMitad);
}

function Merge(primeraMitad, segundaMitad) {
    let resultado = [];
    // mientras los dos esten les quito el primer elemento y lo pongo en el otro array
    while (primeraMitad.length > 0 && segundaMitad.length > 0) {
        if (primeraMitad[0] < segundaMitad[0]) {
            resultado.push(primeraMitad[0]);
            primeraMitad.shift()
        } else {
            resultado.push(segundaMitad[0]);
            segundaMitad.shift()
        }
    }
    // si se acaba alguno lo hago en el otro
    while (primeraMitad.length > 0) {
        resultado.push(primeraMitad[0]);
        primeraMitad.shift()
    }

    while (segundaMitad.length > 0) {
        resultado.push(segundaMitad[0]);
        segundaMitad.shift()
    }

    //devuelvo
    return resultado;
}

console.log(mergeSort([1, 0, 4, 7, 2 ,5 ,8, 7 ,9, 3]));
