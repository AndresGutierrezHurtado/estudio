const alumnos = [
    {
        usuario_id: 51662369,
        usuario_nombre: "Sandra Milena Castellanos Marín",
        usuario_carrera: "Medicina",
        usuario_semestre: "VI",
        usuario_notas: [3.5, 4.0, 3.3, 3.5],
    },
    {
        usuario_id: 80223220,
        usuario_nombre: "Luis Andrés Montoya Montoya",
        usuario_carrera: "Ingeniería de Telecomunicaciones",
        usuario_semestre: "IV",
        usuario_notas: [3.0, 3.3, 4.2, 4.5],
    },
    {
        usuario_id: 79444555,
        usuario_nombre: "Francisco Martínez Marin",
        usuario_carrera: "Ingeniería de Alimentos",
        usuario_semestre: "III",
        usuario_notas: [3.4, 4.5, 4.4, 3.0],
    },
    {
        usuario_id: 79001003,
        usuario_nombre: "Luis Francisco Castañeda Roa",
        usuario_carrera: "Ingeniería de Sistemas",
        usuario_semestre: "VIII",
        usuario_notas: [3.3, 3.4, 4.5, 4.4],
    },
    {
        usuario_id: 79003003,
        usuario_nombre: "Pedro José Pineda Pineda",
        usuario_carrera: "Odontología",
        usuario_semestre: "VI",
        usuario_notas: [4.0, 4.1, 3.9, 4.5],
    },
    {
        usuario_id: 52900901,
        usuario_nombre: "Ruth Paola Mahecha Mahecha",
        usuario_carrera: "Odontología",
        usuario_semestre: "VII",
        usuario_notas: [3.6, 3.6, 3.8, 3.9],
    },
    {
        usuario_id: 26900345,
        usuario_nombre: "Lucia Valderrama Pineda",
        usuario_carrera: "Fisioterapia",
        usuario_semestre: "VIII",
        usuario_notas: [4.4, 4.5, 4.1, 3.1],
    },
    {
        usuario_id: 35676900,
        usuario_nombre: "Mariela Lucia Olguín Ramírez",
        usuario_carrera: "Medicina",
        usuario_semestre: "V",
        usuario_notas: [3.0, 3.1, 4.6, 3.7],
    },
    {
        usuario_id: 27101234,
        usuario_nombre: "Lucila Peñaranda Peñaranda",
        usuario_carrera: "Enfermería",
        usuario_semestre: "II",
        usuario_notas: [2.5, 4.6, 3.4, 4.6],
    },
    {
        usuario_id: 80231678,
        usuario_nombre: "Milena Palacios Palacios",
        usuario_carrera: "Ingeniería Mecánica",
        usuario_semestre: "III",
        usuario_notas: [3.6, 3.4, 3.5, 4.5],
    },
    {
        usuario_id: 1030617979,
        usuario_nombre: "Luis Alberto Castellanos Frias",
        usuario_carrera: "Odontología",
        usuario_semestre: "VI",
        usuario_notas: [4.0, 4.1, 3.9, 4.5],
    },
    {
        usuario_id: 1019066342,
        usuario_nombre: "Nercy Aleidis Rengifo Rengifo",
        usuario_carrera: "Fisioterapia",
        usuario_semestre: "VII",
        usuario_notas: [3.6, 3.6, 3.8, 3.9],
    },
    {
        usuario_id: 1014249436,
        usuario_nombre: "Fabián Raúl Moreno Carvajal",
        usuario_carrera: "Medicina",
        usuario_semestre: "VIII",
        usuario_notas: [4.4, 4.5, 4.1, 3.1],
    },
    {
        usuario_id: 1022380843,
        usuario_nombre: "Jonathan Mauricio Baez Baez",
        usuario_carrera: "Enfermería",
        usuario_semestre: "V",
        usuario_notas: [3.0, 3.1, 4.6, 3.7],
    },
    {
        usuario_id: 1012353083,
        usuario_nombre: "Germán Dario Rodríguez Baez",
        usuario_carrera: "Ingeniería Mecánica",
        usuario_semestre: "II",
        usuario_notas: [2.5, 4.6, 3.4, 4.6],
    },
    {
        usuario_id: 1030630231,
        usuario_nombre: "Diego Fernando Giraldo Romero",
        usuario_carrera: "Ingeniería de Petróleo",
        usuario_semestre: "III",
        usuario_notas: [3.6, 3.4, 3.5, 4.5],
    },
    {
        usuario_id: 1020765332,
        usuario_nombre: "Luz Herminda Fonseca Daza",
        usuario_carrera: "Psicología",
        usuario_semestre: "VI",
        usuario_notas: [4.0, 4.1, 3.9, 4.5],
    },
    {
        usuario_id: 1022357137,
        usuario_nombre: "Rhonald Dahian Jiménez García",
        usuario_carrera: "Ingeniería Civil",
        usuario_semestre: "VI",
        usuario_notas: [3.5, 4.0, 3.3, 3.5],
    },
];

function findUser(id) {
    for (let i = 0; i < alumnos.length; i++) {
        if (alumnos[i].usuario_id == id) {
            return alumnos[i];
        }
    }

    return null;
}

function hallarPromedio(notas) {
    let total = 0;
    for (let i = 0; i < notas.length; i++) {
        total += notas[i];
    }
    return {
        total: total / notas.length,
        fixed: parseInt((total / notas.length) * 10) / 10,
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
