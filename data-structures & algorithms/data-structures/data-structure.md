# Estructuras de Datos en Software

## 1. Stacks (Pilas)
Una pila es una estructura de datos que sigue el principio **LIFO** (Last In, First Out). Esto significa que el último elemento en ser añadido es el primero en ser retirado.

### Operaciones Principales
- **Push:** Añadir un elemento a la cima de la pila.
- **Pop:** Retirar el elemento de la cima de la pila.
- **Peek:** Ver el elemento en la cima sin retirarlo.

[Link del archivo](./stack.mjs "archivo")

## 2. Queues (Colas)
Una cola es una estructura de datos que sigue el principio **FIFO** (First In, First Out). Esto significa que el primer elemento en ser añadido es el primero en ser retirado.

### Operaciones Principales
- **Enqueue:** Añadir un elemento al final de la cola.
- **Dequeue:** Retirar el elemento del frente de la cola.
- **Front:** Ver el elemento al frente sin retirarlo.

[Link del archivo](./queue.js "archivo")

## 3. Sets (Conjuntos)
Un conjunto es una colección de elementos únicos, sin orden específico. Se usa cuando necesitas verificar rápidamente la existencia de un elemento y no te importa el orden.

### Operaciones Principales
- **Add:** Añadir un elemento al conjunto.
- **Remove:** Retirar un elemento del conjunto.
- **Contains:** Verificar si un elemento está en el conjunto.

[Link del archivo](./set.mjs "archivo")

## 4. Linked Lists (Listas Enlazadas)
Una lista enlazada es una secuencia de nodos donde cada nodo contiene un valor y una referencia al siguiente nodo en la secuencia. Se usa para situaciones donde necesitas insertar o eliminar elementos con frecuencia.

### Operaciones Principales
- **Insert:** Insertar un nuevo nodo.
- **Delete:** Eliminar un nodo.
- **Search:** Buscar un nodo con un valor específico.

[Link del archivo](./linked-list.js "archivo")

## 5. Hash Tables (Tablas Hash)
Una tabla hash es una estructura de datos que mapea claves a valores, usando una función hash para calcular el índice en una array donde se almacenan los valores. Es eficiente para búsquedas, inserciones y eliminaciones.

### Operaciones Principales
- **Insert:** Insertar un par clave-valor.
- **Delete:** Eliminar un par clave-valor.
- **Search:** Buscar un valor usando su clave.

[Link del archivo](./hash-table.js "archivo")

## 6. Graphs (Grafos)
Un grafo es una colección de nodos (o vértices) y bordes que conectan pares de nodos. Los grafos se usan para representar relaciones y conexiones.

### Operaciones Principales
- **AddNode:** Añadir un nodo.
- **AddEdge:** Añadir una conexión entre nodos.

[Link del archivo](./graph.mjs "archivo")

## 7. Trees (Árboles)
Un árbol es una estructura de datos jerárquica que consiste en nodos conectados por aristas, con un nodo raíz en la parte superior y subnodos que se ramifican desde la raíz. Se usa para representar datos con una relación jerárquica.

### Tipos
- **Binary-trees:** Cada nodo tiene como máximo dos hijos. [Link del archivo](./trees/binary-tree.js "archivo")
- **Binary-search-trees:** Un árbol binario donde el hijo izquierdo es menor que el nodo y el hijo derecho es mayor. [Link del archivo](./trees/binary-search-tree.js "archivo")
- **AVL-trees:** Un árbol binario de búsqueda auto-balanceado donde las alturas de los subárboles izquierdo y derecho de cualquier nodo difieren en no más de uno. [Link del archivo](./trees/avl-tree.js "archivo")
- **B-trees:** Un árbol auto-balanceado en el que cada nodo puede tener más de dos hijos. Se utiliza principalmente en sistemas de bases de datos y sistemas de archivos. [Link del archivo](./trees/b-tree.js "archivo")

### Operaciones Principales
- **Insert:** Insertar un nuevo nodo.
- **Delete:** Eliminar un nodo.