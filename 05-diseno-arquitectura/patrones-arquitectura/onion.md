# Arquitectura Cebolla

🔙 [Volver al módulo 5](../summary.md)

La **Arquitectura Cebolla** es un estilo de diseño que estructura una aplicación en **capas concéntricas**, donde el **modelo de dominio** ocupa el centro. Este núcleo contiene la lógica de negocio pura y permanece completamente aislado de detalles técnicos o externos.

Las capas externas agregan funcionalidades como infraestructura o interfaces, pero siempre dependen del núcleo, **nunca al contrario**. Esta organización garantiza una fuerte separación de responsabilidades, facilita el mantenimiento del sistema y promueve un **bajo acoplamiento** entre componentes.

---

## 🧱 Componentes en la Arquitectura Cebolla

### 1. Capa del Modelo de Dominio (Domain/Core)

Esta es la capa central y más importante de toda la arquitectura. Contiene las entidades principales del sistema, sus reglas de negocio y objetos de valor. Es completamente independiente de cualquier tecnología, biblioteca o capa externa, lo que garantiza que la lógica de negocio permanezca aislada.

### 2. Capa de Servicios de Dominio (Domain Services)

Aquí se definen interfaces y servicios que encapsulan operaciones que involucran múltiples entidades. Su función es mantener la lógica de negocio que no pertenece a una sola entidad, permitiendo así que el dominio se mantenga cohesivo y centrado.

### 3. Capa de Aplicación (Application Services)

Esta capa se encarga de coordinar los casos de uso de la aplicación. Orquesta el flujo de datos entre el dominio, los servicios y la infraestructura. No contiene lógica de negocio, sino la lógica de ejecución y de coordinación, como llamadas a métodos, validaciones generales y transformación de datos.

### 4. Capa de Infraestructura (Infrastructure)

La infraestructura implementa los detalles técnicos como la persistencia de datos, envío de correos o consumo de APIs externas. Aquí se colocan las implementaciones concretas de las interfaces definidas en las capas internas. Esta capa puede depender de librerías o frameworks, pero nunca debe afectar el dominio.

### 5. Capa de Presentación (Opcional)

Es la capa que se comunica con el usuario final. Puede ser una interfaz web, API REST, aplicación móvil o consola. Su rol es recibir las entradas del usuario, validarlas, y pasarlas a la capa de aplicación. También se encarga de presentar las respuestas o resultados finales al usuario.

---

## 🔃 Flujo de uso

En la Arquitectura Cebolla, el flujo de dependencias siempre apunta hacia el núcleo del sistema. Esto significa que las capas externas pueden depender de las internas, pero nunca al revés.

El modelo de dominio, ubicado en el centro, se mantiene completamente aislado de detalles externos como bases de datos, servicios web o interfaces gráficas. Esto garantiza la estabilidad y pureza de la lógica de negocio.

La interacción con el sistema comienza desde la capa de presentación y fluye hacia adentro, atravesando las capas intermedias hasta llegar al dominio. Las respuestas siguen el mismo camino en sentido inverso.

```plaintext
[Presentación]
    ↓
[Servicios de Aplicación]
    ↓
[Servicios de Dominio / Modelos]
    ↓
[Infraestructura (repositorios, APIs)]
```

---

## ✅ Ventajas y Desventajas

### Ventajas

-   **Bajo acoplamiento** entre componentes y capas.
-   **Alta testabilidad**: la lógica de negocio puede probarse en aislamiento.
-   **Modularidad**: se pueden reemplazar detalles técnicos sin afectar el núcleo.
-   **Escalabilidad** y fácil mantenimiento para sistemas grandes y complejos.

### Desventajas

-   **Curva de aprendizaje elevada**, especialmente para equipos nuevos.
-   **Sobrecarga innecesaria** en aplicaciones pequeñas.
-   **Código repetitivo y boilerplate** por tantas interfaces y capas.
-   **Complejidad en debugging** si no se sigue una buena documentación y trazabilidad.
