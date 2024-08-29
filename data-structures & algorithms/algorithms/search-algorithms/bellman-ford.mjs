import DirectedGraph from "../../data-structures/directed-graph.mjs";

export default function bellmanSearch(graph, start, goal) {
    let distances = {};
    let predecessors = {};

    // Inicialización
    for (const node in graph.nodes) {
        distances[node] = Infinity;
        predecessors[node] = null;
    }
    distances[start.node] = 0;

    let steps = [];

    // Relajar las aristas repetidamente
    for (let i = 0; i < Object.keys(graph.nodes).length - 1; i++) {
        let column = {};
        for (const u in graph.nodes) {
            for (const neighbor of graph.adjList[u]) {
                let v = neighbor.node;
                let weight = neighbor.cost;
                if (distances[u] + weight < distances[v]) {
                    distances[v] = distances[u] + weight;
                    predecessors[v] = u;
                }
            }
            column[u] = { node: u, cost: distances[u] };
        }
        steps.push(column);
    }

    // Comprobación de ciclos negativos
    for (const u in graph.nodes) {
        for (const neighbor of graph.adjList[u]) {
            let v = neighbor.node;
            let weight = neighbor.cost;
            if (distances[u] + weight < distances[v]) {
                throw new Error("El grafo contiene un ciclo de peso negativo");
            }
        }
    }

    // Construcción del camino desde start hasta goal
    let path = [];
    let currentNode = goal.node;
    while (currentNode) {
        path.unshift(currentNode);
        currentNode = predecessors[currentNode];
    }

    // Si el nodo goal no es alcanzable desde start
    if (distances[goal.node] === Infinity) {
        return { steps, path: null, cost: Infinity };
    }

    return { steps, path, cost: distances[goal.node] };
}

// create a graph
let graph = new DirectedGraph();
// add new nodes
graph.addNode("A");
graph.addNode("B");
graph.addNode("C");
graph.addNode("D");
graph.addNode("E");
graph.addNode("F");

// add edges and negative costs
graph.addEdge("A", "B", 1);
graph.addEdge("A", "C", 2);
graph.addEdge("A", "D", 8);
graph.addEdge("B", "E", 3);
graph.addEdge("C", "D", 5);
graph.addEdge("C", "F", 8);
graph.addEdge("C", "E", 3);
graph.addEdge("D", "F", 12);
graph.addEdge("E", "F", 4);

console.log(bellmanSearch(graph, graph.nodes.A, graph.nodes.F));
