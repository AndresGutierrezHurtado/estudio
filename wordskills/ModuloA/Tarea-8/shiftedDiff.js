function shiftedDiff(first, second) {
    let currentIndex = 0;

    let shiftedWord = first;

    do {
        if (shiftedWord === second) return currentIndex;
        currentIndex++;

        let letters = shiftedWord.split("");
        letters.unshift(letters[letters.length - 1]);
        letters.pop();

        shiftedWord = letters.join("");
    } while (currentIndex <= first.length);

    return -1;
}

console.log(shiftedDiff("coffee", "eecoff")); // 2
console.log(shiftedDiff("eecoff", "coffee")); // 4
console.log(shiftedDiff("moose", "Moose")); // -1
console.log(shiftedDiff("isn't", "'tisn")); // 2
console.log(shiftedDiff("Esham", "Esham")); // 0
console.log(shiftedDiff("dog", "god")); // -1
