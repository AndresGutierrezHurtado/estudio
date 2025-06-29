# 🧱 Patrón de Arquitectura MVP (Model-View-Presenter)

El patrón **MVP** (Modelo - Vista - Presentador) es una evolución del patrón **MVC**, pensado para mejorar la separación de responsabilidades y facilitar la prueba de componentes, especialmente en aplicaciones con **interfaces gráficas ricas** como las desarrolladas para escritorio, móviles o web con lógica compleja.

A diferencia de MVC o MVVM, en MVP el componente central es el **Presentador**, que actúa como **intermediario entre la Vista y el Modelo**, gestionando por completo la lógica de presentación y control.

Este patrón es ampliamente utilizado en tecnologías como **WinForms, Android (antes de Jetpack), GWT, aplicaciones web vanilla JS**, entre otras.

---

## 🎯 Objetivo del patrón MVP

El propósito del patrón MVP es lograr una **separación clara entre la lógica de presentación y la lógica de negocio**, facilitando la reutilización del código, el mantenimiento y la testabilidad.

El Presentador asume el control de la UI: recibe eventos desde la Vista, actualiza el Modelo, y luego actualiza la Vista con los resultados.

---

## 🧩 Estructura por capas en el patrón MVP

El patrón MVP está formado por tres componentes principales:

---

### 1️⃣ Modelo (Model)

- Representa la **lógica de negocio** y los **datos** de la aplicación.
- Es totalmente independiente de la interfaz gráfica.
- Puede incluir entidades, reglas de validación y acceso a datos (como servicios REST, bases de datos, etc.).

**Responsabilidades clave:**

- Ejecutar reglas de negocio.
- Recuperar, guardar o actualizar información.
- Validar datos a nivel de dominio.

> **Ejemplo:** Una clase `Usuario` con validaciones internas y métodos para acceder a la base de datos.

---

### 2️⃣ Vista (View)

- Es la **interfaz gráfica** con la que interactúa el usuario.
- No contiene lógica de negocio ni de presentación.
- Solo se encarga de capturar eventos de UI y delegarlos al Presentador.

**Responsabilidades clave:**

- Mostrar información recibida desde el Presentador.
- Notificar al Presentador sobre interacciones del usuario (clics, inputs, etc.).
- Renderizar la interfaz, sin lógica adicional.

> **Ejemplo:** Un formulario HTML o una pantalla XML en Android que captura el nombre y contraseña y delega su envío al Presentador.

**Importante:** En MVP, la Vista **invoca explícitamente métodos del Presentador**, lo que la hace más dependiente de él.

---

### 3️⃣ Presentador (Presenter)

- Es el componente que **contiene toda la lógica de presentación**.
- Recibe eventos desde la Vista, actúa sobre el Modelo, y devuelve resultados a la Vista.
- No tiene referencias a elementos gráficos ni depende de ningún framework de UI.

**Responsabilidades clave:**

- Interpretar acciones del usuario (por ejemplo, "hacer login", "crear producto", etc.).
- Validar datos antes de enviarlos al Modelo.
- Procesar respuestas del Modelo y decidir cómo actualizarlas en la Vista.
- Coordinar el flujo entre Vista ↔ Modelo.

> **Ejemplo:** Un `LoginPresenter` que valida los campos, llama a un servicio de autenticación, y muestra un mensaje de éxito o error en la Vista.

---

## 🔄 Flujo de Datos (Resumen Visual)

```text
[ Usuario ]
    ↓
[ Vista ]
    → (invoca métodos del Presenter)
[ Presenter ]
    ⇅
[ Modelo ]
    ↓
[ Presenter ]
    → (invoca métodos de la Vista para mostrar resultados)
[ Vista ]
