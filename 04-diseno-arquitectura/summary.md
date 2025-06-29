# 📌 Módulo 4: Diseño y Arquitectura de Software

🔙 [Volver al inicio](../README.md)

Cuando hablamos de **Diseño y Arquitectura de Software**, nos referimos a cómo se piensa y organiza un sistema antes de escribir el código. No se trata solo de programar, sino de tomar buenas decisiones desde el principio para que el software sea fácil de mantener, crecer y adaptar con el tiempo.

Un sistema bien diseñado y estructurado es **mantenible, escalable, reutilizable y flexible ante el cambio**. Y es que, en el mundo real, las cosas cambian todo el tiempo: surgen nuevos requerimientos, tecnologías y necesidades. Si el software no está bien pensado desde la base, cualquier cambio puede convertirse en un dolor de cabeza. Una buena arquitectura no solo hace más fácil el trabajo del equipo de desarrollo, también mejora la calidad del producto, reduce costos de mantenimiento y permite integrarse mejor con otros sistemas o herramientas.

Ignorar las buenas prácticas de diseño y arquitectura suele llevar a sistemas rígidos, difíciles de probar, costosos de modificar y propensos a fallos. Por eso, este módulo busca darte los conocimientos, principios y herramientas necesarios para tomar **decisiones técnicas con criterio**, anticipar problemas y asegurar que el software sea sostenible a largo plazo.

### ¿Por qué es importante este módulo?

-   Permite tomar **decisiones técnicas bien argumentadas**, evitando soluciones improvisadas o la aparición de anti-patrones que generan deuda técnica.
-   Facilita la creación de sistemas que sean **fáciles de probar, mantener, escalar y extender**, incluso cuando el equipo o las funcionalidades crecen.
-   Reduce el riesgo de incurrir en errores de diseño o arquitectura que pueden derivar en costosas reescrituras, bloqueos tecnológicos o problemas de rendimiento.
-   Ayuda a construir software alineado con las **necesidades reales del negocio y del dominio**, no limitado solo a lo técnico.
-   Mejora la comunicación entre los distintos perfiles del equipo (desarrolladores, arquitectos, líderes técnicos, DevOps), mediante diagramas, modelos y documentación clara que todos pueden entender.

---

## 🎯 Objetivo del módulo

El objetivo principal de este módulo es brindarte una comprensión completa de los principios, prácticas y herramientas clave para diseñar y estructurar software de forma profesional. Al finalizarlo, serás capaz de:

-   Aplicar principios de diseño como **SOLID**, **KISS** ("Keep It Simple, Stupid"), **DRY** ("Don't Repeat Yourself") y **YAGNI** ("You Aren’t Gonna Need It") para escribir código limpio, simple, reutilizable y enfocado en lo necesario, evitando sobrecomplicar el sistema con funcionalidades que aún no se requieren.
-   Reconocer y usar los principales **patrones de diseño (GoF)** para resolver problemas comunes con soluciones reutilizables y bien estructuradas.
-   Comprender y aplicar diferentes **patrones de arquitectura** como **MVC**, **Arquitectura por capas (Layered Architecture)**, **CQRS**, entre otros, según las necesidades del sistema.
-   Evaluar y seleccionar **estilos arquitectónicos** como **Monolito**, **Microservicios**, **Event-Driven** o **Serverless**, considerando factores técnicos, de negocio y escalabilidad.
-   Representar visualmente la arquitectura de un sistema usando herramientas como el **C4 Model** o diagramas de componentes en UML, facilitando la comunicación técnica dentro del equipo.
-   Diseñar soluciones preparadas para escalar, adaptarse a cambios y evolucionar con el tiempo, minimizando la deuda técnica y facilitando su mantenimiento.

Este módulo te ayudará a tomar decisiones de diseño y arquitectura con criterio técnico y estratégico, mejorando la calidad de tus proyectos y fortaleciendo tu perfil como desarrollador profesional.

---

## 🏗️ Diferencias entre Diseño y Arquitectura de Software

-   **Arquitectura de Software:**  
    Es la **estructura general** del sistema. Se enfoca en el panorama completo: cómo se divide el sistema en partes (por ejemplo, módulos, servicios o capas), cómo se conectan entre sí y qué tecnologías se usarán. Incluye decisiones importantes como si usarás microservicios, cómo manejarás la seguridad o cómo escalará el sistema.

-   **Diseño de Software:**  
    Es el **detalle de cómo construir cada parte**. Se encarga de decidir cómo serán las clases, funciones, nombres de métodos, qué patrones usar (como Factory o Strategy), y cómo se relacionan los objetos entre sí. Está más cerca del código que de la arquitectura.

---

## 🧩 Principios de diseño de Software

Los principios de diseño son **buenas prácticas** que ayudan a escribir software más claro, ordenado y fácil de mantener. Aplicarlos correctamente nos permite evitar errores comunes que aparecen cuando un proyecto crece: código desorganizado, difícil de entender, costoso de modificar o lleno de duplicaciones.

Cuando seguimos estos principios, logramos construir sistemas que son:

-   Más fáciles de leer y entender.
-   Más simples de modificar o escalar.
-   Menos propensos a fallos o errores inesperados.
-   Reutilizables y adaptables a nuevas necesidades.

A continuación, se presentan algunos de los principios más importantes:

### KISS (Keep It Simple, Stupid)

Este principio nos recuerda que **la simplicidad es clave**. Cuanto más simple es el código, más fácil es de entender, mantener y corregir. No se trata de escribir código "tonto", sino de evitar soluciones innecesariamente complicadas.

> ✅ Usa soluciones claras y directas.  
> ❌ Evita sobreingeniería y estructuras rebuscadas que no aportan valor.

### DRY (Don't Repeat Yourself)

Este principio dice que **no deberíamos repetir lógica o datos en varias partes del código**. Si algo cambia, tenerlo duplicado puede causar errores difíciles de detectar.

> ✅ Centraliza la lógica repetida en funciones, clases o módulos.  
> ❌ Copiar y pegar código parecido varias veces solo complica el mantenimiento.

### YAGNI (You Aren't Gonna Need It)

Este principio nos invita a **no desarrollar funcionalidades que “quizás” se necesiten en el futuro**. La mayoría de las veces, esas suposiciones nunca se usan, y solo generan complejidad innecesaria.

> ✅ Enfócate en lo que se necesita ahora.  
> ❌ No anticipes requisitos que aún no existen.

### Principios SOLID

Los principios SOLID son un conjunto de cinco reglas clave para diseñar software orientado a objetos de forma flexible y bien estructurada:

1. **S - Principio de Responsabilidad Única (SRP)**  
   Cada clase debe encargarse de una sola cosa.

    > Así evitamos clases que hacen “de todo” y se vuelven difíciles de modificar.

2. **O - Principio Abierto/Cerrado (OCP)**  
   El código debe poder **extenderse sin necesidad de modificar lo ya hecho**.

    > Esto permite agregar nuevas funcionalidades sin romper lo anterior.

3. **L - Principio de Sustitución de Liskov (LSP)**  
   Las subclases deben poder usarse en lugar de sus clases padre **sin alterar el funcionamiento del sistema**.

    > Esto garantiza que la herencia se usa correctamente.

4. **I - Principio de Segregación de Interfaces (ISP)**  
   Es mejor tener **interfaces pequeñas y específicas**, que grandes y genéricas.

    > Así evitamos que una clase tenga que implementar métodos que no necesita.

5. **D - Principio de Inversión de Dependencias (DIP)**  
   El código debe depender de **abstracciones** (interfaces), no de implementaciones concretas.

    > Esto facilita cambiar partes del sistema sin afectar a todo lo demás.

---

## 🏷️ Patrones de Diseño (GoF)

Los **Patrones de Diseño** son soluciones reutilizables, probadas y documentadas para resolver **problemas comunes en el diseño de software**. No son fragmentos de código, sino **formas de estructurar tu solución** para que sea flexible, mantenible y robusta.

Estos patrones fueron popularizados por el libro _"Design Patterns: Elements of Reusable Object-Oriented Software"_ de la **banda de los cuatro (GoF)**. Se dividen en tres categorías principales:

### 🏗️ Creacionales

Se enfocan en **cómo crear objetos** de forma controlada, desacoplada y flexible.

-   **Singleton:** asegura que una clase solo tenga una única instancia en todo el sistema, y que dicha instancia sea accesible de forma global. Esto es útil, por ejemplo, cuando se maneja una sola conexión a base de datos o un gestor de configuración, ya que no tiene sentido tener múltiples copias de esos objetos.

-   **Factory Method:** Se crea una clase que define un método común que se encarga de crear objetos, pero deja que las subclases decidan qué tipo específico crear, lo cual da flexibilidad para trabajar con una familia de clases sin acoplarse a una en particular.

-   **Abstract Factory:** lleva la idea anterior a otro nivel, ya que permite crear familias enteras de objetos relacionados sin saber exactamente qué clases se están usando internamente.

-   **Builder:** es útil cuando un objeto tiene muchos atributos o pasos de construcción opcionales. En lugar de un constructor con 10 parámetros difíciles de leer, el Builder permite ir armando el objeto paso a paso de forma clara y flexible.

-   **Prototype:** permite clonar objetos existentes para crear nuevos a partir de uno ya configurado. Esto es útil cuando crear un objeto desde cero es muy costoso o complejo.

### 🧱 Estructurales

Ayudan a **componer clases y objetos** para formar estructuras más grandes y flexibles, sin perder claridad ni eficiencia.

-   **Adapter:** Permite que interfaces incompatibles trabajen juntas. Actúa como un traductor entre dos clases que de otro modo no podrían comunicarse. Es útil cuando quieres usar una clase existente pero su interfaz no es compatible con lo que necesitas.

-   **Bridge:** Separa una abstracción de su implementación, permitiendo que ambas evolucionen de forma independiente. Es ideal cuando tienes diferentes variantes de una misma funcionalidad y no quieres una explosión de clases.

-   **Composite:** Permite tratar objetos individuales y composiciones de objetos de manera uniforme. Muy útil cuando trabajas con estructuras jerárquicas como árboles o interfaces gráficas con contenedores y elementos.

-   **Decorator:** Agrega funcionalidades a un objeto de manera dinámica, sin alterar su estructura interna. Es una alternativa flexible a la herencia cuando quieres extender comportamientos de forma controlada y reversible.

-   **Facade:** Proporciona una interfaz simplificada a un subsistema complejo. Es útil para ocultar la complejidad interna de un conjunto de clases y ofrecer un punto de acceso más claro y amigable.

-   **Flyweight:** Reduce el uso de memoria compartiendo instancias comunes entre múltiples objetos similares. Es útil cuando tienes una gran cantidad de objetos que comparten datos en común, como caracteres en un documento de texto.

-   **Proxy:** Controla el acceso a un objeto, actuando como intermediario. Puede usarse para añadir lógica adicional como control de acceso, carga diferida (lazy loading), o registro de uso sin modificar el objeto real.

### 🤝 Comportamiento

Se centran en **cómo interactúan los objetos entre sí**, cómo se comunican y cómo se reparten responsabilidades.

-   **Strategy:** Define una familia de algoritmos, encapsula cada uno y los hace intercambiables. El cliente puede elegir el algoritmo que necesite en tiempo de ejecución sin cambiar el código que lo usa.

-   **Observer:** Permite que múltiples objetos se suscriban y reciban notificaciones de un objeto central. Es ideal para implementar sistemas de eventos o reaccionar a cambios de estado, como en interfaces gráficas o notificaciones.

-   **Command:** Encapsula una solicitud como un objeto, permitiendo parametrizar clientes, almacenar y deshacer operaciones. Muy útil para construir sistemas que ejecutan comandos encolados, como menús, historial o acciones reversibles.

-   **State:** Permite que un objeto altere su comportamiento cuando su estado interno cambia, como si cambiara su clase. Se evita el uso de condicionales extensos y se mejora la claridad del código.

-   **Template Method:** Define el esqueleto de un algoritmo en una clase base, dejando que las subclases redefinan ciertos pasos sin cambiar la estructura general. Favorece el uso de herencia y promueve la reutilización de código.

-   **Chain of Responsibility:** Permite que múltiples objetos tengan la oportunidad de manejar una solicitud, pasándola en cadena hasta que alguien se haga cargo. Útil para sistemas de procesamiento como validaciones, filtros o manejo de eventos.

-   **Mediator:** Centraliza la comunicación entre objetos para reducir el acoplamiento directo entre ellos. En lugar de que cada objeto conozca a los demás, se comunican a través de un mediador que coordina sus interacciones.

-   **Iterator:** Proporciona una forma de recorrer elementos de una colección sin exponer su estructura interna. Establece una interfaz común para recorrer estructuras complejas como listas, árboles o grafos.

-   **Visitor:** Permite definir nuevas operaciones sobre una estructura de objetos sin cambiar las clases de esos objetos. Es útil cuando quieres realizar múltiples operaciones diferentes sobre una estructura de datos fija, como árboles sintácticos o nodos de un documento.

-   **Interpreter:** Define una representación para un lenguaje y un intérprete que utiliza esa representación para evaluar expresiones. Se usa comúnmente en motores de reglas, lenguajes DSL o sistemas que interpretan comandos.

-   **Memento:** Permite capturar y restaurar el estado interno de un objeto sin violar su encapsulamiento. Es útil para implementar funcionalidades como deshacer/rehacer o guardar puntos de control.

---

## Atributos de calidad

Los **atributos de calidad** (también llamados requerimientos no funcionales) definen cómo debe comportarse un sistema más allá de su funcionalidad principal. Afectan directamente a la experiencia del usuario, la mantenibilidad y el rendimiento.

### Principales atributos:

-   **Mantenibilidad**  
    Facilidad para modificar, extender, depurar o mejorar el sistema con bajo costo y riesgo.

-   **Eficiencia**  
    Uso óptimo de los recursos (CPU, memoria, red, disco). Incluye el tiempo de respuesta, el rendimiento y el consumo.

-   **Seguridad**  
    Capacidad del sistema para proteger datos y resistir ataques o accesos no autorizados (autenticación, autorización, cifrado, etc.).

-   **Usabilidad**  
    Facilidad de uso e interacción para el usuario final. Incluye accesibilidad, diseño intuitivo, retroalimentación clara, etc.

-   **Fiabilidad (Confiabilidad)**  
    Capacidad del sistema de funcionar correctamente durante el tiempo esperado. Implica tolerancia a fallos, recuperación y disponibilidad.

-   **Compatibilidad**  
    Capacidad para interactuar con otros sistemas, versiones o plataformas (interoperabilidad, portabilidad).

-   **Adaptabilidad**  
    Facilidad con la que el sistema se puede ajustar a nuevos entornos, tecnologías o requerimientos del negocio.

-   **Escalabilidad**  
    Capacidad del sistema para seguir funcionando eficientemente cuando crecen los datos, usuarios o transacciones.

---

## Estilos de Arquitectura

Los **estilos arquitectónicos** son enfoques generales que definen cómo se estructuran y organizan los componentes de un sistema de software. Funcionan como "familias" de arquitecturas.

### Estilos más comunes:

-   **Monolítico**  
    Toda la lógica del sistema vive en una única aplicación o código base. Fácil de desarrollar inicialmente, pero difícil de escalar y mantener.

-   **Cliente/Servidor**  
    Separación clara entre un cliente (frontend o aplicación) que hace peticiones y un servidor que responde.

-   **Arquitectura por Capas**  
    Organización en capas (presentación, lógica, datos), donde cada una cumple una responsabilidad específica.

-   **Microservicios**  
    El sistema se divide en servicios pequeños, independientes y desplegables de forma aislada. Cada uno tiene su propia lógica y base de datos.

-   **Orientada a Eventos (Event-Driven)**  
    Los componentes se comunican mediante eventos asincrónicos. Muy útil en sistemas desacoplados y en tiempo real.

-   **Microkernel (Plugin)**  
    Núcleo central extensible por módulos o plugins que añaden funcionalidad sin modificar el núcleo.

-   **Pipe & Filter (Flujo de Datos)**  
    Datos que fluyen de manera secuencial a través de etapas (filtros), cada uno transformando la información.

-   **SOA (Service-Oriented Architecture)**  
    Arquitectura basada en servicios reutilizables que se comunican mediante protocolos estándar (como SOAP, REST).

---

## 🏛️ Patrones de Arquitectura de Software

Los **patrones arquitectónicos** son soluciones reutilizables y probadas para resolver problemas comunes en la estructura interna del software. Se aplican dentro de un estilo.

### Principales patrones:

-   **MVC (Modelo - Vista - Controlador)**
    Separa los datos (**Modelo**), la interfaz de usuario (**Vista**) y la lógica de interacción (**Controlador**), mejorando la organización y reutilización del código.

-   **MVVM (Model-View-ViewModel)**
    Variante moderna del MVC, ideal para interfaces reactivas. Introduce un **ViewModel** que expone datos y comandos a la vista mediante _data binding_, desacoplando completamente lógica y presentación.

-   **MVP (Model-View-Presenter)**
    Similar al MVC, pero el **Presentador** reemplaza al controlador y tiene una relación más directa con la vista (puede llamarla). Favorece la testabilidad y separación en aplicaciones con UI compleja.

-   **Hexagonal (Ports & Adapters)**
    Aísla el núcleo de negocio del resto del sistema. El dominio solo se comunica con interfaces (puertos), y el resto del sistema se conecta mediante adaptadores.

-   **Clean Architecture**
    Variante moderna del enfoque hexagonal, con capas bien definidas donde las dependencias siempre apuntan hacia el dominio.

-   **Layered Architecture (por capas)**
    Arquitectura tradicional basada en capas (UI, lógica de negocio, acceso a datos), donde cada una depende de la anterior.

-   **CQRS (Command Query Responsibility Segregation)**
    Separa los comandos (escritura) de las consultas (lectura), optimizando cada parte por separado.

-   **Event Sourcing**
    En lugar de guardar el estado actual, se almacenan todos los eventos que cambiaron ese estado.

---

## 🗂️ Modelado Arquitectónico

Para documentar y visualizar una arquitectura de software de forma clara y compartible, existen enfoques estandarizados:

### 🔸 C4 Model (Context, Container, Component, Code)

-   **Nivel 1 – Contexto:**  
    Muestra cómo el sistema interactúa con usuarios y otros sistemas.

-   **Nivel 2 – Contenedores:**  
    Identifica las aplicaciones, servicios, bases de datos, etc., que componen el sistema.

-   **Nivel 3 – Componentes:**  
    Detalla los componentes principales dentro de cada contenedor.

-   **Nivel 4 – Código:**  
    Opcional. Describe clases, funciones o estructuras de código.
