export const useFindAverage = (grades) => {
    const average = grades.reduce((a, b) => parseInt(a) + parseInt(b), 0) / grades.length;
    return parseInt(average*10) / 10 ;
};