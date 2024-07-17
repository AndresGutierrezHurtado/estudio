class queue {
    constructor(items = []) {
        this.items = items;
    }

    push(item) {
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

clientes.push('Andrés Gutiérrez');
clientes.push('Chiquitín Hurtado');
clientes.push('Tommy Hurtado');

console.log('Elementos en la cola después de añadir clientes:', clientes.print());
console.log('Tamaño de la cola:', clientes.size());
console.log('Primer cliente en la cola:', clientes.front()); 

clientes.dequeue();

console.log('Elementos en la cola después de atender un cliente:', clientes.print());

console.log('¿La cola tiene elementos?', clientes.hasElements()); 

clientes.clear();

console.log('Elementos en la cola después de limpiarla:', clientes.print()); 

console.log('¿La cola tiene elementos después de limpiarla?', clientes.hasElements());

// Uso: Una cola es una estructura de datos FIFO (First In, First Out), donde el primer elemento insertado es el primero en ser eliminado.
// Propósito: Se utilizan para modelar situaciones donde los elementos deben ser procesados en el orden en que llegaron, como la gestión de tareas en un sistema operativo, procesamiento de solicitudes en servidores, o simulaciones basadas en eventos.