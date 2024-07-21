# Algoritmos
Los algoritmos de ordenamiento son procesos o conjuntos de reglas a seguir para organizar elementos en un orden específico. Aquí se describen algunos de los algoritmos de ordenamiento más comunes.

## Terminos a conocer: 

### Complejidad Tiempo vs. Espacio

- **Complejidad Temporal:** Se refiere al tiempo que un algoritmo necesita para ejecutarse en función del tamaño de la entrada. Se mide generalmente en términos de la cantidad de operaciones que el algoritmo realiza.

- **Complejidad Espacial:** Se refiere a la cantidad de memoria que un algoritmo necesita en función del tamaño de la entrada. Incluye el espacio para las variables, estructuras de datos y cualquier otro almacenamiento necesario.

Ambos aspectos son importantes para evaluar la eficiencia de un algoritmo, pero se enfocan en diferentes recursos.

### Cálculo de la Complejidad

Para calcular la complejidad de un algoritmo, se suelen seguir estos pasos:

1. **Identificar las Operaciones Básicas:** Determina qué operaciones dominan el tiempo de ejecución (por ejemplo, comparaciones, asignaciones, etc.).

2. **Contar las Operaciones Básicas:** Estima cuántas veces se ejecutan estas operaciones en función del tamaño de la entrada \( n \).

3. **Expresar la Función:** Escribe la función que describe el número de operaciones en términos de \( n \).

4. **Simplificar con Notación Asintótica:** Usa notación asintótica para describir el crecimiento de la función en términos de \( n \) cuando \( n \) tiende a infinito.

### Notación Asintótica

La notación asintótica se usa para clasificar los algoritmos según su comportamiento de tiempo o espacio en el límite. Aquí están las tres notaciones principales:

- **Notación Big O (O):** Describe el límite superior del tiempo de ejecución. Representa el peor caso de complejidad. Por ejemplo, \( O(n^2) \) indica que el tiempo de ejecución crecerá como un cuadrado del tamaño de la entrada en el peor caso.

- **Notación Big Theta (Θ):** Describe el límite inferior y superior del tiempo de ejecución. Representa el caso promedio y la complejidad exacta. Por ejemplo, \( \Theta(n \log n) \) significa que el tiempo de ejecución crece como \( n \log n \) en todos los casos, tanto el mejor como el peor.

- **Notación Big Omega (Ω):** Describe el límite inferior del tiempo de ejecución. Representa el mejor caso de complejidad. Por ejemplo, \( \Omega(n) \) indica que el tiempo de ejecución crecerá como mínimo proporcional al tamaño de la entrada.

## 1. Algoritmos de Ordenamiento

### Ordenamiento de Inserción (Insertion Sort):
Un algoritmo que construye la lista ordenada elemento por elemento, insertando cada nuevo elemento en la posición correcta dentro de la lista ordenada.

[Link del archivo](./sort-algorithms/insertion-sort.js "archivo")

### Ordenamiento de Selección (Selection Sort):
Un algoritmo que divide la lista en una parte ordenada y otra no ordenada, selecciona repetidamente el elemento mínimo de la parte no ordenada y lo mueve a la parte ordenada.

[Link del archivo](./sort-algorithms/selection-sort.js "archivo")

### Ordenamiento de Conteo (Counting Sort):
Un algoritmo eficiente para ordenar números enteros dentro de un rango pequeño. Cuenta la cantidad de veces que aparece cada valor y utiliza esta información para colocar los elementos en la posición correcta.

[Link del archivo](./sort-algorithms/counting-sort.js "archivo")

### Ordenamiento de Mezcla (Merge Sort):
Un algoritmo de ordenamiento divide y vencerás que divide la lista en dos mitades, las ordena recursivamente y luego las combina.

[Link del archivo](./sort-algorithms/merge-sort.js "archivo")  

### Ordenamiento de Burbuja (Bubble Sort):
Un algoritmo simple que recorre repetidamente la lista, comparando pares adyacentes y cambiándolos si están en el orden incorrecto. Este proceso se repite hasta que la lista está ordenada.

[Link del archivo](./sort-algorithms/bubble-sort.js "archivo")

### Ordenamiento de Rápido (Quick Sort):
Un algoritmo de ordenamiento divide y vencerás que selecciona un pivote, coloca todos los elementos menores que el pivote a su izquierda y todos los mayores a su derecha, y luego ordena recursivamente las sublistas.

[Link del archivo](./sort-algorithms/quick-sort.js "archivo")

### Ordenamiento de Radix (Radix Sort):
funciona dividiendo su entrada en una región ordenada y no clasificada, y reduciendo iterativamente la región no clasificada extrayendo el elemento más grande y moviéndolo a la región clasificada. 

[Link del archivo](./sort-algorithms/radix-sort.js "archivo")

## 2. Algoritmos de Búsqueda

### Busqueda binaria (Binary search):
La búsqueda binaria es un algoritmo eficiente para encontrar un elemento en una lista ordenada dividiendo repetidamente la mitad de la lista en dos partes.

[Link del archivo](./search-algorithms/binary-search.js "archivo")

### Búsqueda Lineal (Linear Search):
La búsqueda lineal es un algoritmo simple que revisa cada elemento en la lista uno por uno hasta que encuentra el objetivo o recorre toda la lista.

[Link del archivo](./search-algorithms/linear-search.js "archivo")

### Algoritmo de BFS (para Grafos):
Es un algoritmo de búsqueda en grafos que explora todos los nodos de un grafo de manera uniforme a lo largo de los niveles. Es especialmente útil para encontrar el camino más corto en un grafo no ponderado.

[Link del archivo](./search-algorithms/breadth-first-search.mjs "archivo")

### Algoritmo de DFS (para Grafos):
es un algoritmo de búsqueda en grafos que explora tan lejos como sea posible a lo largo de cada rama antes de retroceder. Es útil para explorar todas las posibles rutas en un grafo.

[Link del archivo](./search-algorithms/depth-first-search.mjs "archivo")

### Algoritmo de Dijkstra (Dijkstra's Algorithm):
El algoritmo de Dijkstra encuentra el camino más corto desde un nodo inicial a todos los otros nodos en un grafo con pesos no negativos.

[Link del archivo](./search-algorithms/dijkstra-search.mjs "archivo")

### Búsqueda A* (A* Search):
La búsqueda A* es un algoritmo heurístico que se utiliza para encontrar el camino más corto entre dos nodos en un grafo. Utiliza una combinación de la distancia acumulada desde el nodo de inicio y una estimación heurística de la distancia al nodo objetivo.

[Link del archivo](./search-algorithms/a-star-search.mjs "archivo")
