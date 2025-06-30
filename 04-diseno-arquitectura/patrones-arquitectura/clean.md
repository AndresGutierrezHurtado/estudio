# Clean Architecture

🔙 [Volver al módulo 4](../summary.md)

**Clean Architecture** es una forma de organizar el código para que sea **fácil de mantener, probar y escalar**. La idea principal es **separar la lógica del negocio** de los detalles técnicos (como frameworks, bases de datos o controladores), colocando el núcleo del sistema en el centro y aislándolo del resto.

La aplicación se organiza en **capas**, donde cada una tiene su propia responsabilidad. El **centro** es el dominio del negocio, y las capas externas manejan detalles que pueden cambiar con el tiempo, como la base de datos o el framework web.

Una regla clave es que **las dependencias siempre deben apuntar hacia adentro**. Esto significa que el dominio no debe depender de nada externo, pero lo externo sí puede depender del dominio. Este enfoque permite que el sistema sea más **estable ante cambios tecnológicos**, más **fácil de probar** y más **preparado para crecer** sin volverse caótico.

---

## 🧱 Estructura por capas

Clean Architecture se representa mediante **capas concéntricas**, donde cada capa tiene una **responsabilidad clara** y puede comunicarse **solo con las capas internas**, nunca con las externas.

### Entidades (Dominio)

Es el **corazón del sistema**. Aquí se definen las reglas de negocio fundamentales: clases, validaciones, estructuras y métodos que representan cómo funciona la aplicación desde el punto de vista lógico. Esta capa **no depende de ninguna tecnología** y debe mantenerse pura. Su responsabilidad es definir las entidades y validar su comportamiento.

### Casos de Uso (Aplicación)

Orquesta el comportamiento de las entidades para satisfacer los requerimientos del sistema. Aquí se encuentran los **servicios o flujos de negocio** como "registrar usuario", "procesar pago", etc. Esta capa **depende del dominio**, pero no de ningún framework o infraestructura.

### Interfaces (Adaptadores)

Actúa como puente entre el mundo externo y la lógica del sistema. Incluye componentes como **controladores, DTOs, mapeadores y presentadores**. Su función es transformar datos externos (por ejemplo, de una petición HTTP) en estructuras que el sistema pueda manejar, y viceversa.

### Frameworks & Drivers (Infraestructura)

Es la capa más externa. Aquí se ubican los **detalles técnicos y herramientas específicas**: bases de datos, ORMs, frameworks web, APIs externas, controladores HTTP, etc. Esta capa **implementa las interfaces** definidas por las capas internas, pero **nunca las modifica ni accede directamente al dominio**.

---

## ✅ Ventajas y desventajas

### Ventajas

-   **Alta testabilidad:** puedes probar el dominio sin necesidad de base de datos o framework.
-   **Bajo acoplamiento:** cada capa está bien aislada y separada de las demás.
-   **Alta mantenibilidad:** es fácil modificar una capa sin afectar a las demás.
-   **Reutilización:** puedes cambiar la interfaz o infraestructura sin tocar el dominio.

### Desventajas

-   **Complejidad inicial:** requiere más trabajo al comienzo del proyecto.
-   **Curva de aprendizaje:** no es trivial para desarrolladores sin experiencia en diseño limpio.
-   **Overengineering:** no es ideal para proyectos pequeños o MVPs simples.

---

## 🔄 ¿Cómo fluye el código?

El flujo va desde el exterior hacia el núcleo:

```plaintext
[ Cliente (UI, HTTP, CLI) ]
        ↓ llama
[ Interfaces (Controladores, DTOs, Presentadores) ]
        ↓ invoca
[ Casos de Uso (Lógica de Aplicación) ]
        ↓ ejecuta
[ Entidades (Reglas de Negocio) ]
        ↓ puede acceder a
[ Repositorios definidos como interfaces ]
        ↓ implementados por
[ Infraestructura (ORM, API, Drivers) ]
```
