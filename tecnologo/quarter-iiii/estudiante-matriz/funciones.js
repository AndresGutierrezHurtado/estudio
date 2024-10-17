function hallarPromedio (array) {

    let total = 0;
    array.forEach(elemento => {
        total += parseFloat(elemento);
    });
    
    return {
        total: (total / array.length),
        fixed: (parseInt((total / array.length) * 10, 10) / 10),
    };
}