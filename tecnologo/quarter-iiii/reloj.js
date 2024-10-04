function hallarAngulo(horarioF, minuteroF) {

    // Validación
    if (horarioF >= 25 || horarioF <= 0 || minuteroF < 0 || minuteroF >= 60) {
        console.log("El horario/minutero ingresado no existe");
        return null;
    }

    // Asignación
    let horario = horarioF > 12 ? horarioF - 12 : horarioF;

    let tmpMinute = horario * 5 == 60 ? 0 : horario * 5;
    let degrees = 0;

    // Ejecución
    do {

        if (tmpMinute == minuteroF) {
            // degrees -= 30 * (tmpMinute / 60);
            break;
        }

        tmpMinute = tmpMinute + 1 == 60 ? 0 : tmpMinute + 1;
        degrees += 6;

    } while (true);

    // Resultado
    console.log(`El ángulo entre el horario ${horario} y el minutero ${minuteroF} es de ${degrees}°`)
}

const horario = 12;
const minutero = 30;

hallarAngulo(horario, minutero);
