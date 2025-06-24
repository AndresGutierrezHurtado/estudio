# 📌 Módulo 2: Modelos de Desarrollo de Software

Los modelos de desarrollo de software son marcos conceptuales que definen cómo se estructura, organiza y gestiona el proceso de creación de un producto software. Estos modelos establecen las fases, actividades y entregables que deben cumplirse en un proyecto, permitiendo adaptar el desarrollo a las necesidades del cliente, el equipo y el contexto de negocio.

El uso de un modelo de desarrollo adecuado ayuda a reducir riesgos, mejorar la planificación, garantizar la calidad del producto y facilitar la comunicación entre los distintos actores del proyecto. Conocer estos modelos permite a un desarrollador adaptarse a diferentes entornos de trabajo y metodologías, desde enfoques tradicionales hasta los más ágiles y modernos.

---

## 🎯 Objetivo

Identificar y comprender los distintos modelos de desarrollo de software, sus principios, enfoques, fortalezas, limitaciones y escenarios de uso. Esto permitirá evaluar de manera crítica cada modelo y seleccionar el más adecuado según las características y necesidades específicas de un proyecto, optimizando la planificación, reduciendo riesgos, asegurando la calidad del producto final y facilitando la adaptación a diferentes entornos laborales o metodologías de trabajo.

---

## 🔮 Modelos Predictivos

Son modelos secuenciales, donde las etapas del desarrollo están bien definidas y deben completarse una tras otra. Se utilizan en proyectos con requisitos estables y bien conocidos desde el inicio.

### Modelo en Cascada (Waterfall)

-   **Características:** Secuencial, rígido, fácil de gestionar.
-   **Fases:** Requisitos → Diseño → Implementación → Verificación → Mantenimiento.
-   **Ventajas:** Simplicidad, fácil documentación.
-   **Desventajas:** Dificultad para adaptarse a cambios, alto riesgo si se detectan errores tarde.

### Modelo en V (V-Model)

-   **Características:** Extiende el modelo en cascada, relacionando cada fase de desarrollo con su fase de prueba correspondiente.
-   **Ventajas:** Mayor enfoque en la calidad y validación desde el inicio.
-   **Desventajas:** Similar rigidez que Waterfall, poco flexible ante cambios.

---

## ♻️ Modelos Iterativos e Incrementales

Permiten la construcción gradual del producto, a través de versiones o prototipos sucesivos que se validan y mejoran con el tiempo.

### Modelo de Prototipos

-   **Características:** Se desarrolla un prototipo rápido para validar requisitos o diseño.
-   **Ventajas:** Reduce riesgos de mala interpretación de requisitos.
-   **Desventajas:** Puede generar expectativas poco realistas si no se aclara que es solo un prototipo.

### Modelo en Espiral

-   **Características:** Combina elementos del modelo en cascada con iteraciones enfocadas en la gestión de riesgos.
-   **Ventajas:** Adecuado para proyectos complejos y de alto riesgo.
-   **Desventajas:** Mayor coste y tiempo debido a la planificación intensiva.

---

## ⚡ Modelos Ágiles

Se enfocan en la flexibilidad, la colaboración con el cliente y la entrega continua de valor. Son ideales para entornos cambiantes y proyectos donde los requisitos evolucionan.

### Scrum

-   **Características:** Basado en sprints (iteraciones de tiempo fijo), roles definidos (Product Owner, Scrum Master, Developers).
-   **Ventajas:** Alta adaptabilidad, enfoque en valor de negocio.
-   **Desventajas:** Requiere compromiso constante del equipo y del cliente.

### Kanban

-   **Características:** Visualización del flujo de trabajo mediante tableros, control del WIP (Work In Progress).
-   **Ventajas:** Simplicidad, mejora continua, visibilidad de cuellos de botella.
-   **Desventajas:** Menos prescriptivo en roles y planificación que Scrum.

### Extreme Programming (XP)

-   **Características:** Prácticas técnicas rigurosas (TDD, Pair Programming, Integración Continua).
-   **Ventajas:** Alta calidad técnica del código, feedback constante.
-   **Desventajas:** Difícil de adoptar sin cultura técnica sólida.

---

## 🚀 DevOps

DevOps no es simplemente un modelo de desarrollo más, sino una filosofía y una práctica integral que transforma la forma en que los equipos de desarrollo (Dev) y operaciones (Ops) trabajan juntos para crear, entregar y mantener software de alta calidad de manera rápida, confiable y continua.

A diferencia de los modelos tradicionales que separan claramente el desarrollo del despliegue y la operación, DevOps propone una integración constante entre estas áreas, fomentando la colaboración, la automatización y la mejora continua en todo el ciclo de vida del software. Su adopción busca resolver problemas comunes como los retrasos en la entrega, errores en ambientes productivos, falta de visibilidad en los procesos y dificultades para escalar aplicaciones.

### 🔑 Conceptos Clave de DevOps

-   **CI/CD (Integración Continua / Entrega Continua):**  
    Automatización de la integración y despliegue de código, permitiendo validar y entregar cambios frecuentemente con menor riesgo y esfuerzo manual.

-   **Infraestructura como Código (IaC):**  
    Gestión y aprovisionamiento de infraestructuras (servidores, redes, bases de datos) mediante archivos de configuración versionables, facilitando reproducibilidad, escalabilidad y control de cambios.

-   **Automatización de Pruebas y Despliegue:**  
    Las pruebas unitarias, de integración y de aceptación se ejecutan automáticamente en cada ciclo, asegurando calidad constante antes de cualquier despliegue.

-   **Monitorización y Observabilidad:**  
    Implementación de herramientas que permiten detectar fallos, analizar rendimiento y anticipar incidentes en producción, garantizando estabilidad operativa.

-   **Feedback Continuo:**  
    Retroalimentación temprana y constante desde producción hacia el equipo de desarrollo, permitiendo ajustes rápidos y mejoras oportunas.

-   **Cultura Colaborativa:**  
    Eliminación de silos organizacionales entre desarrollo, operaciones, seguridad y calidad, fomentando equipos multifuncionales responsables de todo el ciclo de vida de la aplicación.
