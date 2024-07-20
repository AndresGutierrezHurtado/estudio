class Graph{
    constructor() {
        this.nodes = [];
        this.adjList = [];
    }

    addNode(node, heuristic) {
        this.nodes[node] = {node: node, heuristic: heuristic }
        this.adjList[node] = [];
    }

    addEdge(node1, node2, cost) {
        this.adjList[node1].push({ node: node2, cost: cost });
        this.adjList[node2].push({ node: node1, cost: cost });
    }
}

export default Graph;