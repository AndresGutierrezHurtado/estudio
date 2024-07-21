import Graph from '../../data-structures/graph.mjs';

function breadthFirstSearch(graph, source) {
    let values = [{node: source.node, distance: 0}];
    
    for (let i = 0; i < values.length; i++) {

        graph.adjList[values[i].node].forEach(element => {
            if (values.find(v => v.node === element.node)) return;
            values.push({node: element.node, distance: values[i].distance + 1});
        });

    }

    return values.reverse();
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

console.log(breadthFirstSearch(graph, graph.nodes.A));