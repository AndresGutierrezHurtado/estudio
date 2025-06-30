# Clean Architecture

🔙 [Volver al módulo 4](../summary.md)

## 🧭 Introducción


**Clean Architecture** es un estilo arquitectónico propuesto por **Robert C. Martin (Uncle Bob)** que busca lograr sistemas **independientes del framework, fáciles de probar, mantenibles y adaptables a cambios**. 

La idea principal es **organizar el software en capas concéntricas**, donde el **centro representa el núcleo del negocio (dominio)**, y las capas externas contienen los detalles como frameworks, bases de datos o interfaces de usuario.

Una regla clave de Clean Architecture es:

> **Las dependencias siempre deben ir de afuera hacia adentro**, nunca al revés.

Esto significa que el dominio no depende de ningún detalle externo, como bases de datos, interfaces gráficas, APIs, o frameworks. En cambio, esos detalles dependen del dominio.

---

## 🎯 Objetivo

El objetivo de Clean Architecture es:

- Separar completamente la lógica del negocio de los detalles técnicos.
- Facilitar el cambio de herramientas o tecnologías sin afectar el núcleo del sistema.
- Favorecer la reutilización, testabilidad y mantenimiento del software.
- Aumentar la calidad y robustez del sistema, manteniéndolo coherente con los principios **SOLID**.

---

## 🧱 Estructura por capas

Clean Architecture se estructura en **capas concéntricas**. Cada capa tiene una **responsabilidad clara** y puede comunicarse **solo con las capas internas**, nunca con las externas.

```
+-----------------------------+
|       Interfaces (UI)       |  ← Frameworks & Drivers (por ejemplo: React, HTTP, CLI)
+-----------------------------+
| Application / Use Cases     |  ← Casos de uso específicos
+-----------------------------+
|        Domain Model         |  ← Entidades y lógica de negocio
+-----------------------------+
```

---

### 1. 🧠 Entidades (Domain)

* **¿Qué es?**
  Representa el **núcleo del negocio**, las **reglas más fundamentales** y universales de la aplicación.

* **Responsabilidad:**
  Define objetos ricos en comportamiento que **no dependen de nada externo**, como clases, interfaces, validaciones o reglas de negocio.

* **Ejemplo:**
  Clases como `Usuario`, `Producto`, `Pedido`, y métodos como `realizarPago()` o `calcularDescuento()`.

---

### 2. 📋 Casos de Uso (Application)

* **¿Qué es?**
  Contiene la **lógica específica del sistema** que organiza y orquesta las entidades para cumplir con los requerimientos funcionales.

* **Responsabilidad:**
  Coordinar el flujo de acciones. Aquí se implementan los **servicios, casos de uso o interactores** como `RegistrarUsuario`, `ProcesarPedido`, `ActualizarPerfil`.

* **Ejemplo:**
  Una clase `CrearCuentaUsuario` que valida los datos, crea un objeto `Usuario` y lo guarda en el repositorio.

---

### 3. 🌐 Interfaces (Interface Adapters)

* **¿Qué es?**
  Adapta los datos desde y hacia el mundo externo (UI, API, DB) para que el dominio **no se vea afectado** por esos detalles.

* **Responsabilidad:**
  Contiene controladores, DTOs, validadores, mapeadores o presentadores. **Traduce** entre los formatos que entiende el dominio y los que requiere el mundo externo.

* **Ejemplo:**

  * Un `UsuarioController` que recibe una petición HTTP.
  * Un `UsuarioDTO` que adapta datos al formato que espera el frontend.
  * Un `UsuarioPresenter` que estructura una respuesta amigable para la UI.

---

### 4. 🛠️ Frameworks & Drivers (Infraestructura)

* **¿Qué es?**
  Contiene los **detalles tecnológicos**, como frameworks, bases de datos, controladores HTTP, o herramientas de persistencia.

* **Responsabilidad:**
  Implementar detalles que pueden cambiar sin afectar al resto del sistema. Aquí viven librerías, archivos de configuración, drivers, ORM (como Sequelize, Eloquent), etc.

* **Ejemplo:**

  * Repositorios implementados con Sequelize, PostgreSQL o MySQL.
  * Controladores REST con Express.
  * UI con React o Next.js.

---

## 🔄 Flujo de dependencias

La regla más importante en Clean Architecture es:

> **Las dependencias solo deben apuntar hacia adentro**.

Esto significa que:

* Las entidades **no conocen** los casos de uso.
* Los casos de uso **no saben** qué framework se usa.
* El controlador HTTP **sí conoce** al caso de uso, pero no al revés.

Este diseño permite cambiar el framework, motor de base de datos o tecnología sin tener que modificar el núcleo de negocio.

---

## ✅ Beneficios de Clean Architecture

* **Alta testabilidad:** puedes probar el dominio sin necesidad de base de datos o framework.
* **Bajo acoplamiento:** cada capa está bien aislada y separada de las demás.
* **Alta mantenibilidad:** es fácil modificar una capa sin afectar a las demás.
* **Reutilización:** puedes cambiar la interfaz o infraestructura sin tocar el dominio.

---

## 🛑 Desventajas

* **Complejidad inicial:** requiere más trabajo al comienzo del proyecto.
* **Curva de aprendizaje:** no es trivial para desarrolladores sin experiencia en diseño limpio.
* **Overengineering:** no es ideal para proyectos pequeños o MVPs simples.

---

## 📁 Ejemplo de estructura de carpetas (Node.js)

```plaintext
src/
├── domain/
│   └── entities/
│   └── interfaces/
├── application/
│   └── use_cases/
├── infrastructure/
│   └── database/
│   └── http/
├── interfaces/
│   └── controllers/
│   └── presenters/
│   └── dtos/
```

---

## 📚 Recursos recomendados

* Libro: *Clean Architecture* - Robert C. Martin
* Video: [Clean Architecture explicada (en español)](https://www.youtube.com/watch?v=Kn6ESzGQJFs)
* Repositorio de ejemplo: [GitHub - clean-node](https://github.com/eduardomourar/clean-node)

