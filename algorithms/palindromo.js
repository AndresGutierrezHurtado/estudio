function esPalindromo(text = "") {
    text = text.replace(" ", "").toLowerCase();
    return text == text.split("").reverse().join("");
}

console.log(esPalindromo("Oso"));