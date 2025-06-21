function findLongestWord(sentence) {
    const words = sentence.split(" ");
    const longestWordLength = Math.max(...words.map(w => w.length));
    return words.filter((w) => longestWordLength == w.length);
}

console.log(findLongestWord("The quick brown fox jumps over the lazy dog")); // "jumps"
console.log(findLongestWord("Hello world!")); // "Hello"
console.log(findLongestWord("A journey of a thousand miles begins with a single step")); // "thousand"
