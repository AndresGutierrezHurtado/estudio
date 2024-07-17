class Node {
    constructor(key) {
        this.key = key;
        this.children = [];
    }

    addChild(node) {
        this.children.push(node);
    }
}

class Tree {
    constructor() {
        this.root = null;
    }

    insert(parentKey, key) {
        const newNode = new Node(key);
        if (this.root === null) {
            this.root = newNode;
            return;
        }
        const parentNode = this.search(this.root, parentKey);
        if (parentNode) {
            parentNode.addChild(newNode);
        } else {
            console.log("Parent node not found");
        }
    }

    search(node, key) {
        if (node === null) {
            return null;
        }
        if (node.key === key) {
            return node;
        }
        for (let child of node.children) {
            const result = this.search(child, key);
            if (result) {
                return result;
            }
        }
        return null;
    }

    traversePreOrder(node) {
        if (node === null) {
            return;
        }
        console.log(node.key + " ");
        for (let child of node.children) {
            this.traversePreOrder(child);
        }
    }

    preOrderTraversal() {
        this.traversePreOrder(this.root);
    }
}

// Ejemplo de uso
let tree = new Tree();
tree.insert(null, 1);

tree.insert(1, 2);
tree.insert(1, 3);
tree.insert(2, 4);
tree.insert(2, 5);
tree.insert(3, 6);
tree.insert(3, 7);

console.log("Preorder traversal of the constructed generic tree is:");
tree.preOrderTraversal();
