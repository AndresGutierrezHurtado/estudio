function hallarPromedio(array) {
  let total = 0;
  array.forEach((elemento) => {
    total += parseFloat(elemento);
  });

  return {
    total: total / array.length,
    fixed: parseInt((total / array.length) * 10, 10) / 10,
  };
}

function numeroATexto(numero) {
  const palabraNumero = [
    "cero",
    "uno",
    "dos",
    "tres",
    "cuatro",
    "cinco",
    "seis",
    "siete",
    "ocho",
    "nueve",
    "punto",
  ];
  let palabra = "";

  numero
    .toString()
    .split("")
    .forEach((caracter) => {
      if (caracter == "." || caracter == ",")
        palabra += palabraNumero[10] + " ";
      else palabra += palabraNumero[parseInt(caracter)] + " ";
    });
  return palabra.trimEnd();
}
