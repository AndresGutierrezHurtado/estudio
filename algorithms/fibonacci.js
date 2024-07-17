function fibonacci(cantidad = 5) {
    let fibonacci = [0, 1]

    if (cantidad < 3 && cantidad >= 0) {
        return fibonacci.slice(0, cantidad) + " - cantidad: " + fibonacci.slice(0, cantidad).length;
    }

    for (let i = 1; i < cantidad - 1; i++) {
        fibonacci.push(fibonacci[i-1] + fibonacci[i]);
    }

    return fibonacci + " - cantidad: " + fibonacci.length;

}

// testing
console.log(fibonacci(1));
console.log(fibonacci(2));
console.log(fibonacci(5));
console.log(fibonacci(10));