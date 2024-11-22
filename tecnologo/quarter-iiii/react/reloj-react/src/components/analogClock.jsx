import { AnalogClock } from "@hoseinh/react-analog-clock";

import React from "react";

export default function Clock({hora, minuto, segundo}) {
    const options = {
        showMinuteHand: true,
        showSecondHand: true,
        showBorder: true,
        showHandBase: true,
        smooth: false,
        whiteNumbers: false,
        square: false,
        numbersType: "numbersAndLines",
        borderColor: "#000000",
        handBaseColor: "#000000",
        handColor: {
            hour: "#000000",
            minute: "#000000",
            second: "#e74c3c",
        },
        handLength: { hour: "50px", minute: "60px", second: "70px" },
        handThickness: { hour: "4px", minute: "3px", second: "2px" },
        size: "200px",
        backgroundColor: "#ffffff",
    };

    let time = new Date();
    time.setHours(hora);
    time.setMinutes(minuto);
    time.setSeconds(segundo);

    return (
        <AnalogClock
            staticDate={time}
            {...options}
        />
    );
}
