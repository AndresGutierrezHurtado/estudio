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

export default Set;