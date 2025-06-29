# Patrón de Arquitectura MVC (Model-View-Controller)

El patrón **MVC** es una forma de organizar el código de una aplicación separando sus responsabilidades en tres componentes principales: **Modelo**, **Vista** y **Controlador**. Este patrón es ampliamente utilizado en aplicaciones web, de escritorio y móviles, ya que mejora la mantenibilidad, reutilización y escalabilidad del software.

---

## 📌 Objetivo

Separar la lógica de presentación (vista), la lógica de negocio (modelo) y el flujo de control (controlador), para facilitar el desarrollo y mantenimiento del sistema.

---

## 🧱 Capas del MVC

### 1. Modelo (Model)

- Representa los **datos** y la **lógica de negocio** de la aplicación.
- Se encarga de acceder y manipular la información (normalmente desde una base de datos).
- Notifica a la vista cuando los datos cambian (en frameworks reactivos).
  
**Responsabilidades:**
- Validaciones de negocio.
- Acceso a datos (ORM, consultas SQL, etc.).
- Reglas del dominio.

---

### 2. Vista (View)

* Es la **interfaz de usuario**, muestra los datos que vienen del modelo.
* Su función es presentar la información al usuario de forma atractiva y comprensible.
* No contiene lógica de negocio.

**Responsabilidades:**

* Renderizar HTML, CSS, componentes UI, etc.
* Mostrar datos del modelo.
* Recibir eventos de usuario (que serán gestionados por el controlador).

---

### 3. Controlador (Controller)

* Es el **intermediario** entre el modelo y la vista.
* Recibe eventos de la vista (como clics o formularios).
* Llama al modelo para procesar los datos y luego selecciona la vista adecuada.

**Responsabilidades:**

* Manejo de rutas (en apps web).
* Coordinar las acciones entre modelo y vista.
* Validaciones previas, seguridad, flujos.

---

## 🔄 Flujo de Datos

```text
[ Usuario ]
    ↓
[ Vista (View) ]
    ↓ interacción
[ Controlador (Controller) ]
    ↓ lógica
[ Modelo (Model) ]
    ↓ datos
[ Controlador ]
    ↓
[ Vista (actualiza UI) ]
```

---

## ✅ Ventajas

* Separación clara de responsabilidades.
* Código más organizado y modular.
* Facilita las pruebas y mantenimiento.
* Posibilita el trabajo en equipo (backend y frontend por separado).

---

## ⚠️ Desventajas

* Puede ser más complejo al principio.
* En aplicaciones muy grandes, el controlador puede llenarse de lógica (Controller Fatigue).
* No siempre es intuitivo separar responsabilidades cuando la lógica está muy acoplada.
