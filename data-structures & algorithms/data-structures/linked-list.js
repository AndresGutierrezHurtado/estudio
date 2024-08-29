class Node {
    constructor (element, next =  null) {
        this.element = element;
        this.next = next;
    }
}

class linkedList {
    constructor () {
        this.head = null;        
        this.listSize = 0;
    }

    insert(element) {
        let node = new Node(element);
        let current = this.head;

        if (this.head == null) {
            this.head = node;
        } else {
            while (current.next) {
                current = current.next;
            }
            current.next = node;
        }
        
        this.listSize ++;
    }

    insertAt(position, element) {
        if (position >= 0 && position < this.listSize) {
            let node = new Node(element);
            let current = this.head;
            let previous;
            let index = 0;

            if (position == 0) {
                node.next = current;
                this.head = node;
            } else {
                while (index++ < position) {
                    previous = current;
                    current = current.next;
                }

                node.next = current;
                previous.next = node;
            }

            this.listSize ++

            return true;
        }
        return false;
    }

    removeAt(index) {
        if (index >= 0 && index < this.listSize ) {
            let current = this.head;
            let counter = 0;
            let previous;

            if (index == 0) {
                this.head = current.next;
            } else {
                while (counter ++ < index) {
                    previous = current;
                    current = current.next;
                }

                previous.next = current.next

            }

            this.listSize --;

            return true;
        }
        return false;
    }

    delete(element) {
        let index = this.search(element);
        return this.removeAt(index);
    }

    search(element) {
        let current = this.head;
        let index = 0;

        while (current) {
            if (current.element == element) {
                return index;
            }

            index ++;
            current = current.next;
        }
        
        return -1;
    }

    hasElements() {
        return this.listSize > 0;
    }

    size() {
        return this.listSize;
    }

    print(){
        let current = this.head;
        let string = '';
        let index = 0;

        while (current) {
            string += `(${index}) ${current.element} ${current.next ? '=>' : ''}`
            index ++;
            current = current.next;
        }

        console.log(string);
    }
    
    clear() {
        this.head = null;
        this.listSize = 0;
    }
}

let lista = new linkedList();

lista.insert('Elemento 1');
lista.insert('Elemento 2');
lista.insert('Elemento 3');

console.log('Lista después de añadir elementos:');
lista.print();

lista.insertAt(1, 'Elemento 1.5');
console.log('Lista después de insertar un elemento en la posición 1:');
lista.print();

lista.removeAt(2);
console.log('Lista después de eliminar el elemento en la posición 2:');
lista.print();

console.log('Índice de "Elemento 3":', lista.search('Elemento 3'));

lista.delete('Elemento 1.5');
console.log('Lista después de eliminar "Elemento 1.5":');
lista.print();

console.log('¿La lista tiene elementos?', lista.hasElements()); 

console.log('Tamaño de la lista:', lista.size());

lista.clear();
console.log('Lista después de limpiarla:');
lista.print();

console.log('¿La lista tiene elementos después de limpiarla?', lista.hasElements());
