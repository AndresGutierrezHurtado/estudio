// create a dfs function that makes the depth first search
import Graph from '../../data-structures/graph.mjs';
import Stack from '../../data-structures/stack.mjs';
import Set from '../../data-structures/set.mjs';

function depthFirstSearch(graph, startNode) {

    const visited = new Set();
    const stack = new Stack();
    const result = [];

    stack.push(startNode);

    while (stack.hasElements()) {
        const node = stack.pop();

        if (!visited.contains(node)) {
            visited.add(node);
            result.push(node);

            graph.adjList[node].forEach(element => {
                if (!visited.contains(element.node)) {
                    stack.push(element.node);
                }                
            });
        }
    }

    return result;
}

// Crear el grafo
let graph = new Graph();

graph.addNode("A", 14);
graph.addNode("B", 12);
graph.addNode("C", 11);
graph.addNode("D", 6);
graph.addNode("E", 4);
graph.addNode("F", 11);
graph.addNode("Z", 0);

graph.addEdge("A", "B", 4);
graph.addEdge("A", "C", 3);
graph.addEdge("C", "E", 10);
graph.addEdge("C", "D", 7);
graph.addEdge("B", "F", 5);
graph.addEdge("B", "E", 12);
graph.addEdge("F", "Z", 16);
graph.addEdge("E", "Z", 5);

// Realizar la búsqueda en profundidad desde el nodo "A"
console.log(depthFirstSearch(graph, "A"));
