class Graph{
    constructor() {
        this.nodes = [];
        this.adjList = {};
    }

    addNode(node) {
        this.nodes.push(node);
        this.adjList[node] = [];
    }

    addEdge(node1, node2) {
        this.adjList[node1].push(node2);
        this.adjList[node2].push(node1);
    }
}

let graph = new Graph();

graph.addNode("A");
graph.addNode("B");
graph.addNode("C");


graph.addEdge("A", "C");
graph.addEdge("C", "B");

console.log(graph.adjList);
