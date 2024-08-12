import UndirectedGraph from "../../data-structures/undirected-graph.mjs";

export default function dijkstraSearch(graph, start, goal) {
    let visited = [];
    let routes = [{route: start.node, cost: 0}];

    while (routes.length > 0) {
        let current = routes[0];

        routes.map(element => {
            if (element.cost < current.cost) current = element;
        });
        current.node = (current.route[current.route.length - 1]);

        if (current.node === goal.node) return current;

        visited.push(current.node);
        routes = routes.filter(element => element.route !== current.route);
        
        graph.adjList[current.node].forEach(element => {
            if (visited.includes(element.node)) return;
            routes.push({route: current.route + element.node, cost: current.cost + element.cost});
        });
    }
}

let graph = new UndirectedGraph();
graph.addNode('S', 5);
graph.addNode('A', 8);
graph.addNode('B', 4);
graph.addNode('C', 3);
graph.addNode('D', 2);
graph.addNode('E', 1);
graph.addNode('F', 5);
graph.addNode('G', 9);
graph.addNode('I', 2);
graph.addNode('X', 0);

graph.addEdge('S', 'A', 5);
graph.addEdge('S', 'B', 9);
graph.addEdge('S', 'C', 6);
graph.addEdge('S', 'D', 6);
graph.addEdge('A', 'G', 9);
graph.addEdge('A', 'B', 3);
graph.addEdge('B', 'C', 1);
graph.addEdge('B', 'X', 7);
graph.addEdge('C', 'I', 5);
graph.addEdge('C', 'D', 2);
graph.addEdge('C', 'F', 7);
graph.addEdge('D', 'E', 2);
graph.addEdge('X', 'E', 3);
graph.addEdge('X', 'I', 3);
graph.addEdge('F', 'I', 8);
graph.addEdge('F', 'D', 2);

console.log(dijkstraSearch(graph, graph.nodes.S, graph.nodes.X));