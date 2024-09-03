// Se usa una función callback para manejar la asincronía, esta recibirá una función como parametro

function power(value, callback) {
    setTimeout(() => {
        callback(value, value * value);
    }, Math.random() * 1000);
}

power(2, (value, result) => {
    console.log(`La potencía de ${value} es ${result}`);
    power(5, (value, result) => {
        console.log(`La potencía de ${value} es ${result}`);
        power(7, (value, result) => {
            console.log(`La potencía de ${value} es ${result}`);
            power(10, (value, result) => {
                console.log(`La potencía de ${value} es ${result}`);
            })
        })
    })
})

/* Esta función permitirá manejar la asincronía de forma correcta, pero no suele ser óptima ya que 
se puede generar un código poco legible y más si hay que hacer verificaciones o si las próximas operaciones
dependen de las anteriores */