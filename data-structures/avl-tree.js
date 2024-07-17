class Node {
    constructor(key) {
        this.key = key;
        this.left = null;
        this.right = null;
        this.height = 1;
    }
}

class AVLTree {
    constructor() {
        this.root = null;
    }

    getHeight(node) {
        return node ? node.height : 0;
    }

    getBalanceFactor(node) {
        return node ? this.getHeight(node.left) - this.getHeight(node.right) : 0;
    }

    rightRotate(y) {
        let x = y.left;
        let T2 = x.right;

        x.right = y;
        y.left = T2;

        y.height = Math.max(this.getHeight(y.left), this.getHeight(y.right)) + 1;
        x.height = Math.max(this.getHeight(x.left), this.getHeight(x.right)) + 1;

        return x;
    }

    leftRotate(x) {
        let y = x.right;
        let T2 = y.left;

        y.left = x;
        x.right = T2;

        x.height = Math.max(this.getHeight(x.left), this.getHeight(x.right)) + 1;
        y.height = Math.max(this.getHeight(y.left), this.getHeight(y.right)) + 1;

        return y;
    }

    insert(node, key) {
        if (!node) {
            return new Node(key);
        }

        if (key < node.key) {
            node.left = this.insert(node.left, key);
        } else if (key > node.key) {
            node.right = this.insert(node.right, key);
        } else {
            return node; 
        }

        node.height = 1 + Math.max(this.getHeight(node.left), this.getHeight(node.right));

        let balanceFactor = this.getBalanceFactor(node);

        if (balanceFactor > 1 && key < node.left.key) {
            return this.rightRotate(node);
        }

        if (balanceFactor < -1 && key > node.right.key) {
            return this.leftRotate(node);
        }

        // Left Right Case
        if (balanceFactor > 1 && key > node.left.key) {
            node.left = this.leftRotate(node.left);
            return this.rightRotate(node);
        }

        // Right Left Case
        if (balanceFactor < -1 && key < node.right.key) {
            node.right = this.rightRotate(node.right);
            return this.leftRotate(node);
        }

        return node;
    }

    insertKey(key) {
        this.root = this.insert(this.root, key);
    }

    preOrder(node) {
        if (node !== null) {
            console.log(node.key + " ");
            this.preOrder(node.left);
            this.preOrder(node.right);
        }
    }

    preOrderTraversal() {
        this.preOrder(this.root);
    }
}

// Ejemplo de uso
let avl = new AVLTree();
avl.insertKey(10);
avl.insertKey(20);
avl.insertKey(30);
avl.insertKey(40);
avl.insertKey(50);
avl.insertKey(25);

console.log("Preorder traversal of the constructed AVL tree is:");
avl.preOrderTraversal();
