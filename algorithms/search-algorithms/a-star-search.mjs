import Graph from '../../data-structures/graphs.mjs';

function aStarSearch(graph, inicio, objetivo){
    let openList = {};
    let closedList = {};
    let fScore = inicio.heuristic + 0;

    openList[inicio.node] = {node: inicio.node, f: fScore, g: 0};

    for (let key in openList) {
        if (openList.hasOwnProperty(key)) { // Para asegurarte de que solo se iteren propiedades propias del objeto
          let nodo = openList[key];
          console.log(`Nodo: ${nodo.node}, f: ${nodo.f}, g: ${nodo.g}`);
        }
    }

}

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

aStarSearch(graph, graph.nodes.A, graph.nodes.Z);