import React, { useState } from "react";

export const useGetDegree = (time, start, end) => {
    let degree = 0;
    let startIterator = time[start];
    let endIterator = time[end];

    if (start === "hora") {
        startIterator = time.hora > 12 ? time.hora - 12 : time.hora;
        startIterator = startIterator * 5 == 60 ? 0 : startIterator * 5;
    }
    if (end === "hora") {
        endIterator = time.hora > 12 ? time.hora - 12 : time.hora;
        endIterator = endIterator * 5 == 60 ? 0 : endIterator * 5;
    }

    while (true) {
        if (startIterator === endIterator) {
            if (start === "hora") {
                degree -= 30 * (time.minuto / 60);
            } else if (end === "hora") {
                degree += 30 * (time.minuto / 60);
            }
            break;
        }

        startIterator = startIterator >= 59 ? 0 : startIterator + 1;
        degree += 6;
    }

    return degree;
};
