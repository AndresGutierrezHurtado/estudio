class stack {
    constructor (items = []) {
        this.items = items;
    }

    push(item) {
        this.items.push(item);
    }

    pop() {
        return this.items.pop();
    }

    hasElements() {
        return this.items.length > 0;
    }

    has(item) {
        return this.items.find(v => v.node === item.node);
    }

    size() {
        return this.items.length;
    }

    print() {
        return this.hasElements() ? this.items.toString() : "No hay libros";
    }

    peek() {
        return this.items[this.items.length - 1];
    }

    clear() {
        this.items = [];
    }
}

export default stack;