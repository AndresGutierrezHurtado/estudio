function hallarPromedio (array) {

    let total = 0;
    array.forEach(elemento => {
        total += parseFloat(elemento);
    });
    
    return (total / array.length).toFixed(1);
}