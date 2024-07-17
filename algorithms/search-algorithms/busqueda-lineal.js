function busquedaLinear(array, buscar) {
    for (let i = 0; i < array.length; i++) {
        if (array[i] == buscar) {
            return true
        }
    }
    return false
}

console.log(busquedaLinear([0, 3, 4, 1, 3, 2 , 7, 6, 8, 6], 9));