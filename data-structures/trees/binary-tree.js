class Node {
    constructor (value) {
        this.value = value;
        this.right = null;
        this.left = null
    }    
}

class BinaryTree {
    constructor () {
        this.root = null;
    }

    insert (value) {
        let node = new Node(value);

        if (this.root == null) {
            this.root = node;
        } else {
            this.insertNode(this.root, node);
        }
    }

    insertNode(node, newNode) {
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

    print(node) {
        if (node !== null) {
            this.print(node.left);
            console.log(node.value);
            this.print(node.right);
        }
    }
}

const tree = new BinaryTree();
tree.insert(8);
tree.insert(5);
tree.insert(10);
tree.insert(1);
tree.insert(6);

tree.print(tree.root);