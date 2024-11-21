import React from "react";
import { AnalogClock } from "@hoseinh/react-analog-clock";

export default function Clock({ hora, minuto, segundo }) {
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
        handColor: { hour: "#000000", minute: "#000000", second: "#e74c3c" },
        handLength: { hour: "65px", minute: "90px", second: "90px" },
        handThickness: { hour: "2px", minute: "2px", second: "2px" },
        size: "200px",
        backgroundColor: "#ffffff",
    };
    return <AnalogClock staticDate={new Date(2024, 11, 21, hora, minuto, segundo)} {...options} />;
}
