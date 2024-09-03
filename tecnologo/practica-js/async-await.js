// Las funciones asíncronas se utilizan para manejar la asincronía junto a las promesas.

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

async function funcionAsincrona() {
    try {
        console.log('Iniciando función asíncrona...');

        const data1 = await power(2);
        console.log(`La potencia de ${data1.value} es ${data1.result}`);

        const data2 = await power(5);
        console.log(`La potencia de ${data2.value} es ${data2.result}`);

        const data3 = await power(7);
        console.log(`La potencia de ${data3.value} es ${data3.result}`);

        const data4 = await power(10);
        console.log(`La potencia de ${data4.value} es ${data4.result}`);

        const data5 = await power('Error');
        console.log(`La potencia de ${data5.value} es ${data5.result}`);

    } catch (error) {
        console.error(`Error ${error.code}: ${error.error}`);
    }
}

funcionAsincrona();


// Esta fue una función asíncrona declarada, si fuese expresada, se escribiría de la siguiente manera:
// const funcionAsincronaExpreada = async () => {
//     try {
//         console.log('Iniciando función asíncrona...');

//         const data1 = await power(2);
//         console.log(`La potencia de ${data1.value} es ${data1.result}`);

//         const data2 = await power(5);
//         console.log(`La potencia de ${data2.value} es ${data2.result}`);

//         const data3 = await power(7);
//         console.log(`La potencia de ${data3.value} es ${data3.result}`);

//         const data4 = await power(10);
//         console.log(`La potencia de ${data4.value} es ${data4.result}`);

//         const data5 = await power('Error');
//         console.log(`La potencia de ${data5.value} es ${data5.result}`);

//     } catch (error) {
//         console.error(`Error ${error.code}: ${error.error}`);
//     }
// }