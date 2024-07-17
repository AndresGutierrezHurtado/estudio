class hashTable {
    constructor(size) {
        this.buckets = new Array(size);
        this.numbuckets = this.buckets.length;
    }

    hash (key) {
        let total = 0;

        for (let i = 0; i < key.length; i++) {
            total += key.charCodeAt(i);
        }

        return total % this.numbuckets;
    }

    insert (key, value) {
        let index = this.hash(key);
        if (!this.buckets[index]) this.buckets[index] = [];

        this.buckets[index].push([key, value]);
    }

    get(key) {
        let index = this.hash(key);
        if (!this.buckets[index]) return null;

        for (let i = 0; i < this.buckets[index].length; i++) {
            console.log(this.buckets[index]);
            if (this.buckets[index][i][0] == key) {
                return this.buckets[index][i][1];
            }
        }

        return null;
    }

    remove(key) {
        let index = this.hash(key);
        
        for (let i = 0; i < this.buckets[index].length; i++) {
            if (this.buckets[index][i][0] == key) {
                this.buckets[index].splice(i, 1);
            }
        }
        
        return false;
    }
}

let table = new hashTable(10);

table.insert(
    "Andres", 
    {
        nombre: "Andrés Gutiérrez Hurtado",
        edad: 17,
        telefono: "3209202177",
        email: "andres52885241@gmail.com"
    }
);
table.insert(
    "Wendy", 
    {
        nombre: "Wendy Alejandra Navarro Arias",
        edad: 18,
        telefono: "3044462452",
        email: "nwendy798@gmail.com"
    }
);

console.log(table.get("Andres"));
console.log(table.get("Wendy"));
console.log(table.get("Tommy"));

table.remove("Wendy");

console.log(table.get("Andres"));
console.log(table.get("Wendy"));
console.log(table.get("Tommy"));
