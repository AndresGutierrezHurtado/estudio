# Clean Architecture

🔙 [Volver al módulo 4](../summary.md)

**Clean Architecture** es una manera de estructurar el código que busca que la aplicación sea **fácil de mantener, escalar y probar**. Su principio central es **separar la lógica del negocio** de los detalles técnicos como bases de datos, frameworks o controladores. Esto se logra colocando el núcleo del sistema (el dominio) en el centro y aislándolo de las capas externas.

La aplicación se organiza en **capas concéntricas**, donde cada una tiene una responsabilidad específica.

-   En el **centro** se encuentra el **dominio del negocio**, que contiene las reglas y modelos esenciales.
-   Las **capas externas** se encargan de detalles que pueden cambiar con el tiempo, como la base de datos, la interfaz de usuario o el framework utilizado.

Una regla fundamental es que **las dependencias siempre deben apuntar hacia adentro**.  
Esto significa que el **dominio no debe depender de ninguna capa externa**, pero las capas externas sí pueden depender del dominio. Gracias a esto, el sistema se vuelve más **estable ante cambios tecnológicos**, **más sencillo de probar** y **más preparado para escalar sin volverse caótico**.

Para lograr este aislamiento, se aplica el **Principio de Inversión de Dependencias (DIP)**.  
Las **capas internas definen interfaces**, y las **capas externas las implementan**. De esta forma, el dominio permanece independiente, incluso si se cambian herramientas o tecnologías.

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
