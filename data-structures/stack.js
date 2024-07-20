class stack {
    constructor (items = []) {
        this.items = items;
    }

    push(item) {
        this.items.push(item);
    }

    pop() {
        this.items.pop()
    }

    hasElements() {
        return this.items.length > 0;
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

let libros = new stack();

// Añadir elementos a la pila
libros.push('Nobody can hurt me');
libros.push('El señor de los anillos');
libros.push('Inglés para dummies');

console.log('Elementos en la pila después de añadir libros:', libros.print());
console.log('Tamaño de la pila:', libros.size());
console.log('Último libro en la pila:', libros.peek()); 

// Eliminar el último elemento de la pila
libros.pop();

console.log('Elementos en la pila después de eliminar un libro:', libros.print()); 
console.log('¿La pila tiene elementos?', libros.hasElements());

libros.clear();

console.log('Elementos en la pila después de limpiarla:', libros.print());

// Verificar si la pila tiene elementos después de limpiarla
console.log('¿La pila tiene elementos después de limpiarla?', libros.hasElements());
