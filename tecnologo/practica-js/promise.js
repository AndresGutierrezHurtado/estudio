// Se usa una promesa para manejar la asincronía

function power(value) {
    if (typeof value !== 'number') return Promise.reject({
        code: 400,
        error: `El valor '${value}' debe ser un número.`,
    })
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve({
                value,
                result: value * value
            });
        }, Math.random() * 1000);
    });
}

power(2)
.then(data => {
    console.log(`La potencía de ${data.value} es ${data.result}`);
    return power(5);
})
.then(data => {
    console.log(`La potencía de ${data.value} es ${data.result}`);
    return power(7);
})
.then(data => {
    console.log(`La potencía de ${data.value} es ${data.result}`);
    return power(10);
})
.then(data => {
    console.log(`La potencía de ${data.value} es ${data.result}`);
    return power('Error');
})
.then(data => {
    console.log(`La potencía de ${data.value} es ${data.result}`);
})
.catch(error => {
    console.error(`Error ${error.code}: ${error.error}`);
});

/* La función Promise se puede usar para manejar la asincronía de forma correcta, y suele ser más
legible y más si hay que hacer verificaciones o si las despuéss operaciones dependen de las anteriores 
evitando el callback-hell que se produce con el uso de callbacks */