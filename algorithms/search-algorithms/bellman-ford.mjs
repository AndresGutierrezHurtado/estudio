import DirectedGraph from '../../data-structures/directed-graph.mjs';

export default function bellmanSearch(graph, start, goal) {

    let steps = [];
    let i = 0;
    while(i <= 0) {
        let column = [];

        for (const element in graph.nodes) {
            // recorrer adjList y por cada elemento el cual contenga como relación a element, guardar el menor valor de todos
            for (const adj in graph.adjList) {

                if (graph.adjList[adj].findIndex(x => x.node === element) != -1) {

                }
            }


            column[element] = (element == start.node) ? {node: start.node, cost: 0} : 
            (graph.adjList.A.length > 0 && graph.adjList.A.findIndex(x => x.node === element) != -1) ? 
            {node: 'A', cost: graph.adjList.A[graph.adjList.A.findIndex(x => x.node === element)].cost} : {node: 'A', cost: Infinity};
        }

        steps.push(column);

        i++;
    }

    return steps;
}


// create a graph
let graph = new DirectedGraph();
// add new nodes
graph.addNode('A');
graph.addNode('B');
graph.addNode('C');
graph.addNode('D');
graph.addNode('E');
graph.addNode('F');

// add edges and negative costs
graph.addEdge('A', 'B', 1);
graph.addEdge('A', 'C', 2);
graph.addEdge('A', 'D', 8);
graph.addEdge('B', 'E', 3);
graph.addEdge('C', 'D', 5);
graph.addEdge('C', 'F', 8);
graph.addEdge('C', 'E', 3);
graph.addEdge('D', 'F', 12);
graph.addEdge('E', 'F', 4);

console.log(bellmanSearch(graph, graph.nodes.A, graph.nodes.F));