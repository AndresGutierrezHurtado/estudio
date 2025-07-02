# Arquitectura por Capas

La **arquitectura por capas** es un patrón de diseño estructural que organiza una aplicación en niveles horizontales, donde cada capa tiene una responsabilidad claramente definida. Su principal característica es que **cada capa solo se comunica con la capa inmediatamente inferior**, lo que favorece la **separación de responsabilidades**, facilita el mantenimiento del código y promueve la escalabilidad del sistema.

---

## 🧱 Componentes de la Arquitectura por Capas

A continuación, se describen las capas más comunes en este tipo de arquitectura:

### Capa de Presentación (o Interfaz de Usuario)

-   Encargada de mostrar la información al usuario y capturar sus interacciones.
-   Actúa como puente entre el usuario y el sistema.
-   Suele estar implementada con tecnologías como HTML, CSS, JavaScript (React, Angular, etc.).
-   Se comunica exclusivamente con la capa de lógica de negocio.

### Capa de Lógica de Negocio (o Dominio)

-   Contiene las reglas del negocio, procesos, validaciones y casos de uso.
-   Es el **núcleo funcional** de la aplicación: define **qué se debe hacer** y cómo debe comportarse el sistema.
-   Orquesta la interacción entre presentación y persistencia.
-   No depende de los detalles técnicos de las capas externas, lo que permite que sea fácilmente testeable y reutilizable.

### Capa de Acceso a Datos (o Persistencia)

-   Encargada de gestionar la interacción con fuentes de datos externas como bases de datos, archivos, APIs, etc.
-   Ejecuta operaciones CRUD (crear, leer, actualizar, eliminar).
-   Se implementa comúnmente con ORMs como Sequelize, Prisma, Eloquent, entre otros.
-   Expone una interfaz que es utilizada por la capa de lógica de negocio.

### Capa de Datos (o Almacenamiento)

-   Es el nivel más bajo, donde reside físicamente la información persistente.
-   Incluye motores de bases de datos relacionales (PostgreSQL, MySQL, etc.) o NoSQL (MongoDB, Redis, etc.).
-   Esta capa no tiene conocimiento de las capas superiores.

---

## 🔄 Flujo de Datos

El flujo de ejecución en una arquitectura por capas se da de forma descendente cuando se procesa una solicitud, y ascendente al retornar una respuesta:

```
Usuario
  ↓
Capa de Presentación
  ↓
Capa de Lógica de Negocio
  ↓
Capa de Acceso a Datos
  ↓
Capa de Datos (Base de Datos)
  ↑
Respuesta en sentido inverso
```

Cada capa **solo debe conocer y comunicarse con la capa inmediatamente inferior**, lo que reduce el acoplamiento y mejora la organización del sistema.

---

## ✅ Ventajas y Desventajas

### Ventajas

-   **Separación clara de responsabilidades**, lo que facilita el mantenimiento y evolución del sistema.
-   **Código más modular y reutilizable**, ideal para equipos grandes o proyectos en crecimiento.
-   **Facilidad para pruebas unitarias**, gracias a la independencia entre capas.
-   **Mejor organización del proyecto**, con estructuras más comprensibles.
-   Favorece la aplicación de principios como **SOLID** y buenas prácticas de diseño.

### Desventajas

-   Puede resultar **excesiva para proyectos pequeños o simples**.
-   Genera **mayor cantidad de archivos y clases**, aumentando la complejidad inicial.
-   Puede haber **repetición de código o estructuras innecesarias** (boilerplate).
-   Requiere una **buena documentación y disciplina** para que no se rompa la separación entre capas.
