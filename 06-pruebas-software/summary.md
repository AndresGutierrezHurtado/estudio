# 📌 Módulo 6: Pruebas de Software (Testing)

🔙 [Volver al inicio](../README.md)

El desarrollo de software profesional no se limita únicamente a programar funcionalidades que "funcionen" en condiciones ideales; requiere garantizar que el sistema sea confiable, robusto y capaz de responder correctamente ante situaciones imprevistas, cambios o evolución futura. Las pruebas de software (o software testing) son una actividad esencial para validar que el producto cumple con los requisitos funcionales y no funcionales esperados, reduciendo la probabilidad de defectos en producción y mejorando la calidad global del sistema.

En proyectos reales, los errores no detectados en etapas tempranas pueden generar costos elevados en términos de tiempo, dinero y reputación. Por ello, implementar prácticas de testing adecuadas es un elemento clave en el ciclo de vida del desarrollo de software, independientemente del lenguaje, framework o paradigma que se utilice.

---

## 🎯 Objetivo del Módulo

Este módulo tiene como propósito no solo comprender los fundamentos y tipos de pruebas de software, sino también desarrollar la capacidad de aplicarlos de manera efectiva dentro del flujo de trabajo diario del desarrollo. Esto incluye la integración de pruebas automatizadas en pipelines de **Integración Continua y Despliegue Continuo (CI/CD)**, asegurando así la validación constante de la calidad del código.

El objetivo es que, al finalizar este módulo, el desarrollador sea capaz de:

-   Validar que el software funcione correctamente bajo diferentes escenarios y condiciones de uso, en conformidad con los requisitos funcionales y no funcionales establecidos.
-   Minimizar la aparición de defectos o fallos en ambientes productivos.
-   Facilitar la evolución, mejora continua y refactorización del código sin comprometer su estabilidad o funcionalidad existente.
-   Adoptar prácticas modernas y efectivas como el **Desarrollo Guiado por Pruebas (TDD)** para fomentar la escritura de código seguro, mantenible y bien diseñado desde el inicio.
-   Utilizar herramientas y frameworks reconocidos como **Jest** (para entornos JavaScript/TypeScript) y **PHPUnit** (para proyectos en PHP) que permiten automatizar la ejecución de pruebas de manera eficiente y escalable.

## El dominio de estas prácticas es esencial para cualquier desarrollador que aspire a construir soluciones de software robustas, mantenibles y de alta calidad, independientemente de la tecnología, arquitectura o contexto del proyecto en el que se desempeñe.

## 🧩 Conceptos importantes

### ¿Qué son las pruebas de software?

Las pruebas de software consisten en un conjunto de actividades diseñadas para evaluar la calidad de una aplicación o sistema. Su propósito es identificar errores o defectos, verificando que este se comporte como se espera en diferentes situaciones de uso.

Las pruebas de software son fundamentales porque permiten detectar errores en etapas tempranas del desarrollo, evitando así costos elevados que implicaría corregirlos en producción. Además, garantizan que el producto cumpla con los requisitos y expectativas tanto del negocio como de los usuarios finales, asegurando su calidad. También brindan confianza para evolucionar, escalar o modificar el sistema sin temor a generar fallos en funcionalidades ya implementadas, gracias a la prevención de regresiones. Finalmente, contribuyen a la satisfacción del cliente al permitir la entrega de un software estable, confiable y alineado con sus necesidades, fortaleciendo la reputación de la empresa.

### Cobertura de Código (Code Coverage)

La cobertura de código mide el porcentaje de líneas o bloques de código que han sido ejecutados al correr las pruebas. Aunque una cobertura alta no garantiza ausencia total de errores, sí indica qué partes del sistema están siendo verificadas.

-   **Herramientas:** Jest (`--coverage`), PHPUnit Coverage, Istanbul.
-   **Buenas prácticas:** No obsesionarse con el 100%, priorizar cobertura de lógica crítica.

### Mocking, Stubbing y Spying

Técnicas fundamentales para aislar componentes durante pruebas unitarias o de integración.

-   **Mocks:** Simulan comportamientos de objetos o dependencias.
-   **Stubs:** Devuelven datos controlados para evitar dependencias externas.
-   **Spies:** Verifican si funciones fueron llamadas (y con qué argumentos).

**Herramientas:** Jest (`jest.mock()`, `jest.fn()`, `jest.spyOn()`), sinon.js.

Incorporar testing automático en pipelines CI/CD es clave para validar cada cambio de código.

-   **Plataformas comunes:** GitHub Actions, GitLab CI/CD, Jenkins.
-   **Prácticas recomendadas:**
    -   Ejecutar tests en Pull Requests.
    -   Bloquear despliegues si fallan tests.
    -   Aplicar estrategia "fail fast" para detectar errores temprano.

### Test Flakiness (Pruebas Inestables)

Son pruebas que fallan de forma intermitente sin cambios en el código.

-   **Causas comunes:** Tiempos de espera mal configurados, dependencias externas no mockeadas.
-   **Solución:** Uso correcto de waits, mocks y entorno controlado para tests.

### Métricas de Testing

Miden la efectividad y calidad del proceso de pruebas.

-   **Cobertura de código (%).**
-   **Tasa de fallos vs. éxitos.**
-   **Duración total de la suite de pruebas.**
-   **Errores detectados antes de producción.**

### 🔹 Testing de APIs

Validar APIs es esencial para garantizar que los endpoints funcionen correctamente, manejen errores y respeten los contratos esperados.

-   **Herramientas:** Postman (con Newman CLI), SuperTest (para Node.js), Pest PHP.
-   **Prácticas recomendadas:**
    -   Verificar status codes esperados (200, 404, 500).
    -   Validar estructura de respuesta (JSON Schema, OpenAPI/Swagger).
    -   Simular casos de error y validación de datos.

---

## Tipos de Pruebas de Software

### 🔹 Pruebas Unitarias (Unit Testing)

Las pruebas unitarias verifican el correcto funcionamiento de la unidad más pequeña del código, como funciones, métodos o clases individuales. Se usan para detectar errores lógicos o de cálculo en etapas tempranas del desarrollo, lo que permite corregir problemas antes de que se propaguen a otros niveles del sistema. Su aporte principal es garantizar que cada componente por separado haga exactamente lo que se espera, facilitando así el desarrollo seguro, mantenible y con menor cantidad de fallos ocultos. El objetivo de estas pruebas es asegurar que las unidades de código funcionen correctamente de manera aislada.

### 🔹 Pruebas de Integración (Integration Testing)

Las pruebas de integración se encargan de evaluar la interacción entre varios módulos o componentes del sistema para comprobar que se comuniquen de manera adecuada y que no existan fallos en sus dependencias. Se utilizan para detectar errores que no aparecen cuando los módulos se prueban de forma individual, pero que pueden surgir cuando estos interactúan entre sí. Su aporte es fundamental para garantizar que los diferentes bloques del sistema trabajen de manera conjunta sin conflictos. El objetivo principal es validar la correcta integración y cooperación de los distintos módulos del software.

### 🔹 Pruebas de Aceptación (Acceptance Testing)

Las pruebas de aceptación validan que el sistema o producto final cumpla con los requisitos funcionales y no funcionales esperados por el cliente o usuario final. Se usan para asegurar que la solución desarrollada resuelva el problema o necesidad real del negocio, garantizando así su utilidad y relevancia en el contexto de aplicación. Su aporte es clave para reducir el riesgo de entregar un producto que no satisfaga las expectativas del cliente o que no se ajuste a las condiciones establecidas. El objetivo de estas pruebas es confirmar que el software cumple con los criterios de aceptación previamente definidos y que está listo para ser utilizado en producción.

### 🔹 Pruebas de Desempeño (Performance Testing)

Evalúan cómo se comporta el sistema bajo diferentes condiciones de carga o estrés, midiendo tiempos de respuesta, uso de recursos, estabilidad y escalabilidad. Son esenciales para aplicaciones que requieren alta disponibilidad o manejo de muchos usuarios concurrentes.

**Tipos comunes:**

-   **Pruebas de Carga:** Miden el rendimiento bajo volumen normal o creciente de usuarios.
-   **Pruebas de Estrés:** Evalúan la estabilidad cuando se exceden los límites de capacidad.
-   **Pruebas de Soak (Duración):** Analizan la degradación de desempeño durante largos períodos.

### 🔹 Pruebas End-to-End (E2E)

Las pruebas E2E validan flujos completos de usuario simulando interacciones reales sobre la aplicación completa (frontend + backend).

-   **Herramientas:** Cypress, Playwright, Selenium.
-   **Objetivo:** Asegurar que todas las partes del sistema funcionen correctamente juntas.
-   **Consideraciones:** Ejecutar pocas pruebas E2E (cima de la pirámide de testing) por su alto costo en tiempo.

---

## 🎯 Enfoques de Pruebas

En Ingeniería de Software se consideran diferentes enfoques para diseñar casos de prueba según el conocimiento que se tenga del sistema:

### 🔸 Caja Blanca (White-Box Testing)

-   **Qué es:** Las pruebas se diseñan con pleno conocimiento del código fuente.
-   **Objetivo:** Validar rutas, flujos de control, condiciones y estructuras internas del software.
-   **Ventajas:** Detecta errores de lógica, caminos no ejecutados, bucles infinitos, etc.
-   **Ejemplo:** Pruebas de cobertura de código, pruebas de funciones individuales.

### 🔸 Caja Negra (Black-Box Testing)

-   **Qué es:** Las pruebas se diseñan sin conocer la estructura interna del código, solo a partir de requisitos y especificaciones.
-   **Objetivo:** Validar entradas y salidas esperadas, comportamiento funcional.
-   **Ventajas:** Detecta errores de comportamiento, validaciones incorrectas, problemas de interfaz.
-   **Ejemplo:** Pruebas de interfaz de usuario, pruebas de API públicas.

### 🔸 Caja Gris (Gray-Box Testing)

-   **Qué es:** Combinación de caja blanca y negra. El probador tiene acceso limitado al código o conocimiento parcial de la lógica interna.
-   **Objetivo:** Obtener una visión equilibrada de la funcionalidad y la estructura interna.
-   **Ventajas:** Permite diseñar pruebas más efectivas con menos esfuerzo que la caja blanca total.
-   **Ejemplo:** Pruebas de integración de APIs internas conocidas, pruebas de middleware.

---

## ⚙️ TDD: Desarrollo Guiado por Pruebas (Test-Driven Development)

El **TDD** es una metodología de desarrollo que cambia el enfoque tradicional: primero se escriben las pruebas, luego se desarrolla el código necesario para que estas pasen.

### Beneficios de TDD:

-   Promueve diseño simple y claro.
-   Mejora la cobertura de pruebas.
-   Reduce la aparición de errores lógicos.
-   Facilita el mantenimiento y la refactorización continua del código.

### Proceso típico:

1. Escribir una prueba que falla.
2. Escribir el código mínimo para que pase la prueba.
3. Refactorizar el código manteniendo las pruebas verdes.

---

## 🏛️ Pirámide de Testing

Explicación de la estrategia piramidal para equilibrar los tipos de pruebas:

1. Base: Pruebas Unitarias (mayoría)
2. Intermedio: Pruebas de Integración
3. Cima: Pruebas E2E (pocas)

---

## ✅ Buenas Prácticas en Testing

-   Pruebas rápidas, independientes y repetibles
-   Nomenclatura clara
-   Evitar overtesting
-   Enfocarse en comportamiento, no implementación

---
