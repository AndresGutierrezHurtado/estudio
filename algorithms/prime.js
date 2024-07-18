function esPrimo(numero) {
    if (numero > 0 && numero <= 3 ) return true;
    
    for (let i = 2; i < numero; i++) {
        if (numero % i == 0) return false;
    }

    return true;
}

console.log(esPrimo(7));
console.log(esPrimo(8));
console.log(esPrimo(13));