class DirectedGraph{
    constructor() {
        this.nodes = [];
        this.adjList = [];
    }

    addNode(node, heuristic = 0) {
        this.nodes[node] = {node: node, heuristic: heuristic }
        this.adjList[node] = [];
    }

    addEdge(node1, node2, cost) {
        this.adjList[node1].push({ node: node2, cost: cost });
    }
}

export default DirectedGraph;