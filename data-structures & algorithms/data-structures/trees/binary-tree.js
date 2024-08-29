class Node {
    constructor(value) {
        this.value = value;
        this.left = null;
        this.right = null;
    }
}

class BinaryTree {
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

    // fix this function
    insertNode (node, newNode) {
        if (node.left == null || node.right == null) {
            if (node.left == null) {
                node.left = newNode;
                return true;
            } else {
                node.right = newNode;
                return true;
            }
        } else {
            if(this.insertNode(node.left, newNode)) return true;
            if(this.insertNode(node.right, newNode)) return true;
        }
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

let arbol = new BinaryTree();
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
