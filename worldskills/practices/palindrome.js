function isPalindrome(word) {
    return word.replaceAll(" ", "") == word.replaceAll(" ", "").split("").reverse().join("");
}

// Tests
console.log(isPalindrome("anita lava la tina"));
console.log(isPalindrome("perro"));
