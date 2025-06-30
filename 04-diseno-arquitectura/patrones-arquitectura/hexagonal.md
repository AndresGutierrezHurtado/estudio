# Patrón de Arquitectura Hexagonal (Ports and Adapters)

🔙 [Volver al módulo 4](../summary.md)

La **Arquitectura Hexagonal**, también conocida como **Ports and Adapters**, propone una forma de estructurar las aplicaciones donde el **núcleo de negocio** queda completamente **aislado** de los detalles externos como bases de datos, interfaces gráficas, frameworks o servicios.

Este enfoque busca que el sistema sea **independiente de la infraestructura**, facilitando su evolución, mantenimiento y pruebas. Así, si en el futuro se necesita cambiar un framework, una base de datos o el tipo de entrada (HTTP, eventos, CLI, etc.), **no será necesario modificar el núcleo de la aplicación**.

---

## 🧱 Componentes de la Arquitectura Hexagonal

### Dominio (Core / Domain / Núcleo)

Esta capa representa el **centro de la aplicación**. Contiene todo lo relacionado con las **reglas de negocio**, los **casos de uso** y las **entidades**. No depende de ninguna tecnología externa.

Aquí defines las clases que **modelan tu sistema**, como `Usuario`, `Producto` o `Pedido`, así como interfaces como `RepositorioDeUsuarios`. También viven los casos de uso (`CrearUsuario`, `ActualizarPerfil`, etc.), que son flujos de negocio concretos.

### Puertos de entrada (Ports / Use Cases / Application)

Esta capa expone el comportamiento que ofrece el sistema al exterior, mediante **interfaces o servicios de aplicación**. Actúa como un **contrato** para que los adaptadores externos puedan comunicarse con el núcleo.

También puede incluir la lógica concreta de esos casos de uso, actuando como **servicios de aplicación** (`UserService`, `AuthUseCase`, etc.). Estos son llamados por los adaptadores de entrada (como los controladores HTTP).

### Adaptadores de entrada (Adapters In Bound / Infrastructure)

Recibe las acciones del mundo exterior (usuarios, sistemas externos, interfaces gráficas, etc.) y las traduce en llamados a los casos de uso del sistema. Puede incluir:

-   Controladores REST (`UserController`, `AuthController`)
-   Interfaces gráficas
-   Listeners de eventos o comandos CLI

Esta capa se encarga de convertir entradas tecnológicas (por ejemplo, una petición HTTP) en acciones del dominio.

### Adaptadores de entrada (Adapters Out Bound)

Contiene las **implementaciones técnicas concretas** de las interfaces que el dominio necesita para interactuar con el mundo exterior, como repositorios o servicios externos.

-   Repositorios (implementados con ORM)
-   Servicios externos (APIs de terceros)
-   Integraciones con servicios de notificaicones, almacenamiento, etc.

Estas clases implementan las interfaces definidas en el dominio (`RepositorioDeUsuarios`, `ServicioDeEmail`) usando tecnología específica como MySQL, PostgreSQL, MongoDB, HTTP, etc.

---

## 🔄 Flujo de Datos

```text
[ Usuario o sistema externo ]
    ↓
[ Adaptador de entrada (ej: controlador HTTP) ]
    ↓ llama
[ Puerto de entrada (ej: caso de uso CrearUsuario) ]
    ↓ ejecuta lógica del negocio
[ Núcleo (entidades, validaciones, reglas) ]
    ↓ necesita guardar/consultar datos
[ Puerto de salida (ej: RepositorioDeUsuarios) ]
    ↓ se llama a la implementación real
[ Adaptador de salida (ORM, API, DB, etc.) ]
    ↓ responde con los datos procesados
[ Puerto de entrada recibe los datos y arma una respuesta ]
    ↓
[ Adaptador de entrada envía la respuesta al usuario (JSON, vista, mensaje) ]
```

> 📌 Nota: Aunque el dominio ejecuta la lógica, nunca se comunica directamente con tecnología (como una base de datos). Siempre lo hace a través de interfaces (puertos de salida), que luego son implementadas por adaptadores.

---

## ✅ Ventajas y desventajas

### Ventajas

-   **Desacoplamiento fuerte** entre el dominio y la infraestructura.
-   **Alta testabilidad**: el núcleo puede probarse sin necesidad de conexiones reales.
-   **Flexibilidad tecnológica**: puedes cambiar la base de datos, el framework web o el UI sin tocar el dominio.
-   Facilita el **crecimiento por capas**, manteniendo limpio el centro.

## Desventajas

-   Mayor **complejidad inicial** para proyectos pequeños o simples.
-   Requiere **disciplina** en la organización del código.
-   El diseño puede parecer **sobrecargado** si no se aplica correctamente.
