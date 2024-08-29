class Node {
    constructor(value) {
        this.value = value;
        this.left = null;
        this.right = null;
        this.height = 1;
    }
}

class AVLTree {
    constructor() {
        this.root = null;
    }

    // Obtener la altura de un nodo
    getHeight(node) {
        return node ? node.height : 0;
    }

    // Obtener el factor de balanceo de un nodo
    getBalance(node) {
        return node ? this.getHeight(node.left) - this.getHeight(node.right) : 0;
    }

    // Rotación a la derecha
    rightRotate(y) {
        const x = y.left;
        const T2 = x.right;

        x.right = y;
        y.left = T2;

        y.height = Math.max(this.getHeight(y.left), this.getHeight(y.right)) + 1;
        x.height = Math.max(this.getHeight(x.left), this.getHeight(x.right)) + 1;

        return x;
    }

    // Rotación a la izquierda
    leftRotate(x) {
        const y = x.right;
        const T2 = y.left;

        y.left = x;
        x.right = T2;

        x.height = Math.max(this.getHeight(x.left), this.getHeight(x.right)) + 1;
        y.height = Math.max(this.getHeight(y.left), this.getHeight(y.right)) + 1;

        return y;
    }

    // Insertar un nodo en el árbol AVL
    insert(node, value) {
        if (!node) {
            return new Node(value);
        }

        if (value < node.value) {
            node.left = this.insert(node.left, value);
        } else if (value > node.value) {
            node.right = this.insert(node.right, value);
        } else {
            return node; // Los valores duplicados no se permiten
        }

        node.height = Math.max(this.getHeight(node.left), this.getHeight(node.right)) + 1;

        const balance = this.getBalance(node);

        // Caso de desbalanceo: izquierda izquierda
        if (balance > 1 && value < node.left.value) {
            return this.rightRotate(node);
        }

        // Caso de desbalanceo: derecha derecha
        if (balance < -1 && value > node.right.value) {
            return this.leftRotate(node);
        }

        // Caso de desbalanceo: izquierda derecha
        if (balance > 1 && value > node.left.value) {
            node.left = this.leftRotate(node.left);
            return this.rightRotate(node);
        }

        // Caso de desbalanceo: derecha izquierda
        if (balance < -1 && value < node.right.value) {
            node.right = this.rightRotate(node.right);
            return this.leftRotate(node);
        }

        return node;
    }

    // Buscar un valor en el árbol AVL
    search(node, value) {
        if (!node || node.value === value) {
            return node;
        }

        if (value < node.value) {
            return this.search(node.left, value);
        }

        return this.search(node.right, value);
    }

    // Insertar un valor en el árbol AVL
    insertValue(value) {
        this.root = this.insert(this.root, value);
    }

    // Buscar un valor en el árbol AVL
    searchValue(value) {
        return this.search(this.root, value);
    }

    // Recorrido in-order
    inOrder(node) {
        if (node) {
            this.inOrder(node.left);
            console.log(node.value);
            this.inOrder(node.right);
        }
    }
}

// Ejemplo de uso
let avl = new AVLTree();

avl.insertValue(10);
avl.insertValue(20);
avl.insertValue(5);
avl.insertValue(6);
avl.insertValue(15);
avl.insertValue(30);
avl.insertValue(25);

console.log("Recorrido in-order:");
avl.inOrder(avl.root);

console.log("Buscar 15:", avl.searchValue(15) ? "Encontrado" : "No Encontrado");
console.log("Buscar 7:", avl.searchValue(7) ? "Encontrado" : "No Encontrado");
