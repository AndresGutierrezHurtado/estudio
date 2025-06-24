# 📌 Módulo 4: Diseño y Arquitectura de Software

El **Diseño y la Arquitectura de Software** constituyen dos pilares fundamentales dentro de la ingeniería de software profesional. Estos conceptos van mucho más allá de la simple implementación de código; representan la base sobre la cual se construyen sistemas capaces de perdurar en el tiempo, adaptarse a nuevas necesidades y evolucionar sin comprometer su calidad o funcionamiento.

Diseñar y estructurar correctamente un sistema permite que este sea **mantenible, escalable, reutilizable y flexible ante el cambio**, cualidades esenciales en proyectos reales donde los requisitos evolucionan constantemente. Una arquitectura adecuada no solo facilita el trabajo del equipo de desarrollo, sino que también impacta positivamente en la calidad del producto final, su costo de mantenimiento y su capacidad para integrarse con otros sistemas o tecnologías.

Ignorar las buenas prácticas de diseño y arquitectura conduce con frecuencia a sistemas rígidos, costosos de modificar, difíciles de probar y propensos a fallos. Por ello, este módulo se centra en dotarte de los conocimientos, principios y herramientas necesarios para tomar **decisiones técnicas fundamentadas**, anticipando problemas futuros y garantizando la sostenibilidad del software a largo plazo.

### ¿Por qué es importante este módulo?

- Permite tomar **decisiones técnicas bien argumentadas**, evitando soluciones improvisadas o la aparición de anti-patrones que generan deuda técnica.
- Facilita la creación de sistemas que son **fáciles de probar, mantener, escalar y extender**, incluso cuando el equipo o la funcionalidad del producto crecen con el tiempo.
- Reduce el riesgo de incurrir en fallos de diseño o arquitectura que pueden derivar en costosas reescrituras, bloqueos tecnológicos o problemas de rendimiento.
- Ayuda a construir software alineado con las **necesidades reales del negocio y del dominio del problema**, no limitado únicamente a los aspectos técnicos.
- Mejora la comunicación entre los distintos perfiles del equipo de desarrollo (desarrolladores, arquitectos, líderes técnicos, DevOps), mediante diagramas, modelos y documentación clara que todos pueden entender.

---

### 🎯 Objetivo del módulo

El objetivo principal de este módulo es proporcionar una comprensión sólida de los principios, prácticas y herramientas asociadas al diseño y la arquitectura de software. Al finalizar este módulo, serás capaz de:

- Aplicar los **principios SOLID** para escribir código limpio, modular y de fácil mantenimiento.
- Reconocer y utilizar adecuadamente los principales **patrones de diseño (GoF)** para resolver problemas recurrentes de manera elegante y reutilizable.
- Evaluar y seleccionar entre diferentes **patrones de arquitectura** (como Monolito, Microservicios, Event-Driven o Serverless) en función de los requisitos técnicos y de negocio de un proyecto.
- Representar gráficamente la arquitectura de un sistema utilizando modelos como el **C4 Model** o diagramas UML de componentes, facilitando la comunicación técnica con otros miembros del equipo.
- Diseñar sistemas preparados para el cambio, la escalabilidad y la evolución continua, reduciendo riesgos de obsolescencia o re-trabajo a futuro.

En definitiva, este módulo te capacitará para tomar decisiones de diseño y arquitectura con criterio profesional, elevando la calidad técnica de tus proyectos y fortaleciendo tu perfil como desarrollador o arquitecto de software.

---

## 🔶 Diferencias entre Diseño y Arquitectura de Software

-   **Arquitectura de Software:**  
    Es la visión de alto nivel del sistema. Define cómo se organizan los componentes principales, cómo se comunican entre sí y cómo se distribuyen las responsabilidades. Incluye decisiones tecnológicas clave, restricciones no funcionales (rendimiento, seguridad, escalabilidad) y patrones de organización global.

-   **Diseño de Software:**  
    Es la visión de detalle. Determina cómo se implementan los componentes definidos por la arquitectura, cómo se estructuran las clases, métodos, funciones, cómo se gestionan las dependencias y cómo se aplican patrones de diseño para resolver problemas técnicos específicos.

---

## 🔶 Principios SOLID

Los principios SOLID son fundamentales para el diseño de software orientado a objetos y para mantener código limpio, flexible y fácil de mantener.

1. **S - Single Responsibility Principle (SRP):**  
   Una clase debe tener una única razón para cambiar.  
   _Evita que una clase asuma múltiples responsabilidades._

2. **O - Open/Closed Principle (OCP):**  
   Las entidades de software deben estar abiertas para su extensión, pero cerradas para su modificación.  
   _Permite añadir nuevas funcionalidades sin alterar el código existente._

3. **L - Liskov Substitution Principle (LSP):**  
   Las clases derivadas deben ser sustituibles por sus clases base sin alterar el comportamiento esperado.  
   _Garantiza una jerarquía de herencia correcta._

4. **I - Interface Segregation Principle (ISP):**  
   Los clientes no deben verse forzados a depender de interfaces que no utilizan.  
   _Promueve interfaces pequeñas y específicas._

5. **D - Dependency Inversion Principle (DIP):**  
   Las dependencias deben ser abstraídas. Los módulos de alto nivel no deben depender de módulos de bajo nivel, ambos deben depender de abstracciones.  
   _Facilita la inversión de control (IoC) y la inyección de dependencias (DI)._

---

## 🔶 Patrones de Diseño (GoF)

Los **Patrones de Diseño** son soluciones comprobadas a problemas comunes de diseño en desarrollo de software. Se clasifican en tres grandes grupos:

### Creacionales

-   **Singleton:** Garantiza que una clase tenga una única instancia global.
-   **Factory Method:** Define una interfaz para crear objetos, dejando a las subclases decidir qué clase instanciar.
-   **Abstract Factory:** Produce familias de objetos relacionados sin especificar sus clases concretas.
-   **Builder:** Permite construir un objeto paso a paso.
-   **Prototype:** Crea nuevos objetos copiando una instancia existente.

### Estructurales

-   **Adapter:** Permite que interfaces incompatibles trabajen juntas.
-   **Composite:** Permite tratar objetos individuales y composiciones de objetos de manera uniforme.
-   **Decorator:** Agrega funcionalidades a un objeto de manera dinámica.
-   **Facade:** Proporciona una interfaz simplificada a un subsistema complejo.
-   **Proxy:** Controla el acceso a un objeto.

### Comportamiento

-   **Strategy:** Define una familia de algoritmos, encapsula cada uno y los hace intercambiables.
-   **Observer:** Permite que múltiples objetos se suscriban y reciban notificaciones de un objeto central.
-   **Command:** Encapsula una solicitud como un objeto, permitiendo parametrizar clientes.
-   **State:** Permite que un objeto altere su comportamiento cuando su estado interno cambia.
-   **Template Method:** Define el esqueleto de un algoritmo, dejando algunos pasos a subclases.

---
