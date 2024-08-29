class BTreeNode {
    constructor(t, leaf = false) {
        this.t = t; // Mínimo grado (número mínimo de hijos)
        this.leaf = leaf; // True si es hoja
        this.keys = []; // Claves del nodo
        this.children = []; // Hijos del nodo
    }

    // Insertar una nueva clave en el nodo no hoja
    insertNonFull(key) {
        let i = this.keys.length - 1;

        if (this.leaf) {
            // Encuentra la posición para insertar la nueva clave
            while (i >= 0 && key < this.keys[i]) {
                i--;
            }
            this.keys.splice(i + 1, 0, key);
        } else {
            // Encuentra el hijo apropiado para insertar la nueva clave
            while (i >= 0 && key < this.keys[i]) {
                i--;
            }
            i++;
            if (this.children[i].keys.length === 2 * this.t - 1) {
                this.splitChild(i, this.children[i]);
                if (key > this.keys[i]) {
                    i++;
                }
            }
            this.children[i].insertNonFull(key);
        }
    }

    // Dividir un hijo del nodo
    splitChild(i, y) {
        let t = y.t;
        let z = new BTreeNode(t, y.leaf);
        this.children.splice(i + 1, 0, z);
        this.keys.splice(i, 0, y.keys[t - 1]);

        z.keys = y.keys.splice(t, t - 1);
        if (!y.leaf) {
            z.children = y.children.splice(t, t);
        }
    }

    // Buscar una clave en el nodo
    search(key) {
        let i = 0;
        while (i < this.keys.length && key > this.keys[i]) {
            i++;
        }

        if (i < this.keys.length && this.keys[i] === key) {
            return this;
        }

        if (this.leaf) {
            return null;
        }

        return this.children[i].search(key);
    }
}

class BTree {
    constructor(t) {
        this.root = new BTreeNode(t, true);
        this.t = t; // Mínimo grado
    }

    // Insertar una nueva clave en el árbol
    insert(key) {
        let root = this.root;

        if (root.keys.length === 2 * this.t - 1) {
            let s = new BTreeNode(this.t, false);
            this.root = s;
            s.children.push(root);
            s.splitChild(0, root);
            s.insertNonFull(key);
        } else {
            root.insertNonFull(key);
        }
    }

    // Buscar una clave en el árbol
    search(key) {
        return this.root.search(key);
    }
}

// Ejemplo de uso
let bTree = new BTree(3); // Árbol B con grado mínimo 3

bTree.insert(10);
bTree.insert(20);
bTree.insert(5);
bTree.insert(6);
bTree.insert(15);
bTree.insert(30);

console.log("Buscar 15:", bTree.search(15) ? "Encontrado" : "No Encontrado");
console.log("Buscar 25:", bTree.search(25) ? "Encontrado" : "No Encontrado");
