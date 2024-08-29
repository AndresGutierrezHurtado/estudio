class Node {
    constructor(value) {
        this.value = value;
        this.left = null;
        this.right = null;
    }
}

class BinarySearchTree {
    constructor() {
        this.root = null;
    }

    insert(value) {
        let node = new Node(value);
        if (this.root == null){ 
            this.root = node;
        } else {   
            this.insertNode(this.root, node);
        }
    }

    insertNode (node, newNode) {
        if (node.value > newNode.value) {
            if (node.left == null) {
                node.left = newNode;
            } else {
                this.insertNode(node.left, newNode);
            }
        } else {
            if (node.right == null) {
                node.right = newNode;
            } else {
                this.insertNode(node.right, newNode);
            }
        }
    }

    search( node, value ) {
        if (node == null) return {"valor": value, "encontrado": false};
        if (node.value == value) return {"valor": value, "encontrado": true};
        if (node.value < value) return this.search(node.right, value);
        if (node.value > value) return this.search(node.left, value);
        return false
    }

    inOrder(node) {
        if (node != null || node) {
            this.inOrder(node.left);
            console.log(node.value);
            this.inOrder(node.right);
        }
    }

    preOrder(node) {
        if (node != null || node) {
            console.log(node.value);
            this.preOrder(node.left);
            this.preOrder(node.right);
        }
    }

    postOrder(node) {
        if (node != null || node) {
            this.postOrder(node.left);
            this.postOrder(node.right);
            console.log(node.value);
        }
    }
}

let arbol = new BinarySearchTree();
arbol.insert(10);
arbol.insert(5);
arbol.insert(15);
arbol.insert(2);
arbol.insert(7);
arbol.insert(13);
arbol.insert(17);

console.log("-- Recorrido in-order --");
arbol.inOrder(arbol.root);

console.log("-- Recorrido pre-order --");
arbol.preOrder(arbol.root);

console.log("-- Recorrido post-order --");
arbol.postOrder(arbol.root);

console.log("-- Busquedas --");
console.log(arbol.search(arbol.root, 17));
console.log(arbol.search(arbol.root, 19));