function fatestRunners(runners) {
    // [{name, paces}]: [{name, fastest, average}]
    let pacesList = runners.flatMap(({ paces }) => paces);
    pacesList = pacesList.map((el) => convertNumer(el));
    const totalAvg = pacesList.reduce((acc, c) => acc + c, 0) / pacesList.length;

    let response = runners.map(({ name, paces }) => {
        let runnerPaces = paces.map((el) => convertNumer(el));
        let averagePace = runnerPaces.reduce((acc, c) => acc + c, 0) / runnerPaces.length;

        return {
            name,
            averagePace: convertNumer(averagePace, "string"),
            fastestPace: convertNumer(Math.min(...runnerPaces), "string"),
        };
    });

    response = response.sort((a, b) => convertNumer(a.fastestPace) - convertNumer(b.fastestPace));
    return response.filter(el => convertNumer(el.fastestPace) < totalAvg);
}

function convertNumer(time, type = "seconds") {
    if (type == "seconds") {
        const [minutes, seconds] = time.split(":");
        return parseInt(minutes) * 60 + parseInt(seconds);
    } else {
        const minutes = Math.floor(time / 60);
        const seconds = time - minutes * 60;
        return `${minutes}:${seconds}`;
    }
}

const mock = [
    {
        name: "Alice",
        paces: ["5:50", "6:00", "6:06", "6:07", "6:08", "6:19", "6:28"],
    },
    {
        name: "Bob",
        paces: ["6:10", "6:05", "6:00", "5:55", "6:15", "6:20", "6:18"],
    },
    {
        name: "Charlie",
        paces: ["5:45", "5:50", "5:55", "6:00", "6:05", "6:10", "6:15"],
    },
    {
        name: "Diana",
        paces: ["6:30", "6:25", "6:20", "6:15", "6:10", "6:05", "6:00"],
    },
    {
        name: "Eve",
        paces: ["5:55", "6:01", "6:03", "6:07", "6:09", "6:12", "6:14"],
    },
    {
        name: "Frank",
        paces: ["6:40", "6:45", "6:50", "6:55", "7:00", "7:05", "7:10"],
    },
];

console.log(fatestRunners(mock));
