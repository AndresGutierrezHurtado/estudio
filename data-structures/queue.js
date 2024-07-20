class queue {
    constructor(items = []) {
        this.items = items;
    }

    enqueue(item) {
        this.items.push(item);
    }

    dequeue() {
        this.items.shift();
    }

    front() {
        return this.items[0];
    }

    hasElements() {
        return this.items.length > 0;
    }

    size() {
        return this.items.length
    }

    print() {
        return this.items.toString();
    }

    clear() {
        this.items = []
    }
}


let clientes = new queue();

clientes.enqueue('Andrés Gutiérrez');
clientes.enqueue('Chiquitín Hurtado');
clientes.enqueue('Tommy Hurtado');

console.log('Elementos en la cola después de añadir clientes:', clientes.print());
console.log('Tamaño de la cola:', clientes.size());
console.log('Primer cliente en la cola:', clientes.front()); 

clientes.dequeue();

console.log('Elementos en la cola después de atender un cliente:', clientes.print());

console.log('¿La cola tiene elementos?', clientes.hasElements()); 

clientes.clear();

console.log('Elementos en la cola después de limpiarla:', clientes.print()); 

console.log('¿La cola tiene elementos después de limpiarla?', clientes.hasElements());
