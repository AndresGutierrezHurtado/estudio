class Set {
    constructor() {
        this.items = {};
    }

    add(element) {
        if (!this.contains(element)) {
            this.items[element] = element;
            return true;
        }
        return false;
    }

    remove(element) {
        if (this.contains(element)) {
            delete this.items[element];
            return true;
        }
        return false;
    }

    contains(element) {
        return Object.prototype.hasOwnProperty.call(this.items, element);
    }

    values() {
        return Object.values(this.items);
    }

    size() {
        return Object.keys(this.items).length;
    }

    clear() {
        this.items = {};
    }

    union(otherSet) {
        const unionSet = new Set();
        this.values().forEach(value => unionSet.add(value));
        otherSet.values().forEach(value => unionSet.add(value));
        return unionSet;
    }

    intersection(otherSet) {
        const intersectionSet = new Set();
        this.values().forEach(value => {
            if (otherSet.contains(value)) {
                intersectionSet.add(value);
            }
        });
        return intersectionSet;
    }

    difference(otherSet) {
        const differenceSet = new Set();
        this.values().forEach(value => {
            if (!otherSet.contains(value)) {
                differenceSet.add(value);
            }
        });
        return differenceSet;
    }

    isSubsetOf(otherSet) {
        return this.values().every(value => otherSet.contains(value));
    }
}

let conjuntoA = new Set();
let conjuntoB = new Set();

conjuntoA.add(1);
conjuntoA.add(2);
conjuntoA.add(3);

console.log('Conjunto A después de añadir elementos:', conjuntoA.values());

conjuntoB.add(3);
conjuntoB.add(4);
conjuntoB.add(5);

console.log('Conjunto B después de añadir elementos:', conjuntoB.values()); 

let unionAB = conjuntoA.union(conjuntoB);
console.log('Unión de A y B:', unionAB.values());

let interseccionAB = conjuntoA.intersection(conjuntoB);
console.log('Intersección de A y B:', interseccionAB.values()); 

let diferenciaAB = conjuntoA.difference(conjuntoB);
console.log('Diferencia de A y B:', diferenciaAB.values());

console.log('¿Conjunto A es un subconjunto de B?', conjuntoA.isSubsetOf(conjuntoB));

let conjuntoC = new Set();
conjuntoC.add(3);
console.log('¿Conjunto C es un subconjunto de B?', conjuntoC.isSubsetOf(conjuntoB));

conjuntoA.remove(3);
console.log('Conjunto A después de eliminar 3:', conjuntoA.values());

conjuntoA.clear();
console.log('Conjunto A después de limpiarlo:', conjuntoA.values())

console.log('Tamaño del conjunto B:', conjuntoB.size());

console.log('¿Conjunto B tiene el elemento 4?', conjuntoB.contains(4));
console.log('¿Conjunto B tiene el elemento 10?', conjuntoB.contains(10));
