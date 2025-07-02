# 🧱 Patrón de Arquitectura MVP (Model-View-Presenter)

🔙 [Volver al módulo 4](../summary.md)

El patrón **MVP** (Modelo - Vista - Presentador) es una evolución del patrón **MVC**, diseñado para mejorar la **separación de responsabilidades** y facilitar la **prueba de componentes**, especialmente en aplicaciones con **interfaces gráficas complejas**, como las desarrolladas para escritorio, dispositivos móviles o web con lógica de presentación avanzada.

A diferencia de **MVC**, donde el **Controlador** puede tener cierto acoplamiento con la Vista, en **MVP** el componente central es el **Presentador**, que actúa como un **intermediario totalmente desacoplado** entre la Vista y el Modelo. El Presentador se encarga de toda la **lógica de presentación** y controla la comunicación entre la interfaz y los datos, sin depender de elementos gráficos ni frameworks de UI.

Este patrón ha sido ampliamente adoptado en tecnologías como **WinForms**, **Android (antes de Jetpack Compose)**, **Google Web Toolkit (GWT)** y **aplicaciones web con JavaScript puro**, donde se busca un control explícito de la interacción entre capas y alta testabilidad.

---

## 🧩 Estructura por capas en el patrón MVP

El patrón MVP está formado por tres componentes principales:

### 1️⃣ Modelo (Model)

El Modelo representa la **lógica de negocio** y la **gestión de los datos**. Es responsable de definir las reglas del dominio y acceder a las fuentes de información, como bases de datos o servicios externos.

Esta capa es completamente independiente de la interfaz de usuario. No tiene ninguna relación con la Vista ni con el Presentador, lo que permite reutilizar su lógica en distintos contextos.

Dentro del Modelo pueden existir entidades, validaciones a nivel de negocio, operaciones CRUD (crear, leer, actualizar, eliminar), y conexión a APIs o fuentes de persistencia.

### 2️⃣ Vista (View)

La Vista es la parte visible de la aplicación, es decir, la **interfaz gráfica** que interactúa con el usuario. Su única responsabilidad es **mostrar datos** y **capturar eventos** como clics, entradas de texto o acciones.

Esta capa no contiene lógica de negocio ni lógica de presentación. Cada vez que ocurre una interacción del usuario, la Vista delega completamente la gestión al Presentador.

En MVP, la Vista está **más acoplada al Presentador**, ya que debe **invocar directamente sus métodos** para notificar cualquier evento.

### 3️⃣ Presentador (Presenter)

El Presentador es el núcleo del patrón MVP. Es quien **recibe los eventos de la Vista**, se comunica con el Modelo para procesar datos o ejecutar reglas de negocio, y luego **actualiza la Vista** con los resultados.

Toda la **lógica de presentación** vive aquí: validaciones de formularios, gestión de estados, coordinación entre capas y preparación de datos para la interfaz.

A diferencia de un Controlador en MVC, el Presentador no tiene ninguna dependencia con elementos visuales. Trabaja con interfaces o abstracciones que representan la Vista, lo que permite probar su lógica sin necesidad de ejecutar la UI.

---

## 🔄 Flujo de Datos (Resumen Visual)

```text
[ Usuario ]
    ↓
[ Vista ] (invoca métodos del Presenter)
    ↓
[ Presenter ] (Procesa la lógica de presentación)
    ↓
[ Modelo ] (Aplica reglas de negocio y accede a datos)
    ↓
[ Presenter ] (invoca métodos de la Vista para mostrar resultados)
    ↓
[ Vista ] (Muestra los resultados al usuario)

```
