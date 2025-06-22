## 📌 Módulo 03: Análisis de Requisitos

### 🎯 **Objetivo del Módulo**

Desarrollar la capacidad de identificar, recolectar, analizar, documentar y validar de manera rigurosa los requisitos funcionales y no funcionales de un sistema de software como etapa estratégica dentro del ciclo de vida del desarrollo de software (SDLC).

La correcta ejecución de esta fase no solo permite garantizar que el producto final satisfaga las expectativas de los stakeholders y los objetivos de negocio, sino que además sienta las bases conceptuales y técnicas necesarias para las siguientes fases del proyecto: diseño, arquitectura, desarrollo, pruebas y mantenimiento.

Un análisis de requisitos sólido y bien fundamentado permite:

-   **Comprender con claridad el problema de negocio y las necesidades reales del cliente**, delimitando con precisión el alcance funcional y técnico del proyecto. Esto reduce ambigüedades, malentendidos o suposiciones erróneas que podrían impactar negativamente en el resultado final.

-   **Construir diagramas de casos de uso, diagramas de clases, diagramas de actividades y otros modelos UML**, que no solo representan de forma gráfica la funcionalidad y estructura del sistema, sino que además son insumos directos para definir:

    -   La **estructura modular del backend** (servicios, controladores, repositorios).
    -   Los **modelos de datos** que serán implementados mediante ORMs o directamente en SQL.
    -   Las **interfaces de usuario (UI/UX)** basadas en flujos reales de los usuarios finales.

-   **Seleccionar con fundamento el stack tecnológico (lenguajes, frameworks, librerías)** que mejor se adapte a las restricciones no funcionales documentadas: rendimiento, escalabilidad, compatibilidad, seguridad, entre otros.

-   **Elaborar de manera detallada los planes de prueba y criterios de aceptación**, ya que cada requisito documentado se convierte en un insumo verificable para pruebas unitarias, de integración, funcionales y de aceptación del usuario.

-   **Estimar de forma realista tiempos, costos, recursos humanos y tecnológicos** requeridos para cada fase del proyecto, gracias a una visión detallada de todas las funcionalidades y dependencias técnicas involucradas.

-   **Garantizar la trazabilidad de los requisitos a lo largo de todo el ciclo de vida del proyecto**, asegurando que cada componente desarrollado, probado o desplegado responda a una necesidad de negocio real documentada.

-   **Reducir riesgos técnicos, de negocio y de calidad**, al anticipar posibles conflictos o restricciones desde etapas tempranas, evitando cambios costosos o fallos críticos en fases avanzadas.

En definitiva, **el análisis de requisitos no es solo una actividad previa al desarrollo, sino un pilar transversal que impacta directamente la calidad, mantenibilidad, escalabilidad y éxito del producto final**, al conectar las necesidades del negocio con las soluciones técnicas implementadas.

---

## 📝 **Conceptos Fundamentales – Análisis de Requisitos**

El análisis de requisitos define con precisión **qué debe hacer el sistema** y **bajo qué condiciones debe funcionar**, evitando malinterpretaciones que podrían conducir a la construcción de un producto que no resuelve el problema real del cliente.

A continuación se presentan los conceptos clave que conforman esta fase crítica:

---

### 1. **Requisito**

Un requisito es una descripción documentada de una propiedad, capacidad, restricción o comportamiento que el sistema debe satisfacer para cumplir con las necesidades del usuario, negocio o entorno operativo.

---

### 2. **Tipos de Requisitos**

#### 🔹 **Requisitos Funcionales (RF):**

Describen lo que el sistema debe hacer: funcionalidades específicas que permitan cumplir los objetivos planteados.

-   **Ejemplos:**

    -   Autenticación de usuarios.
    -   Generación de reportes en PDF.

#### 🔹 **Requisitos No Funcionales (RNF):**

Definen atributos de calidad y restricciones sobre el funcionamiento del sistema.

-   **Ejemplos:**

    -   Procesar 1000 transacciones por segundo.
    -   Cumplir con estándares de seguridad OWASP.

#### 🔹 **Requisitos de Dominio:**

Requisitos propios del contexto o sector del negocio.

-   **Ejemplo:**

    -   En banca: transferencias superiores a \$10,000 requieren doble autenticación.

---

### 3. **Técnicas de Levantamiento de Requisitos**

Se aplican métodos como entrevistas, encuestas, prototipos y análisis de documentación para extraer información precisa de stakeholders y usuarios finales.

---

### 4. **Modelado de Requisitos**

El modelado representa de manera visual y estructurada los requisitos para facilitar su comprensión, validación e implementación efectiva. Estos modelos no son solo documentación pasiva; son herramientas activas que permiten:

-   **Diseñar la arquitectura técnica y la lógica de negocio** desde la etapa de análisis, estableciendo los componentes que formarán el backend (servicios, controladores, interfaces, repositorios).

-   **Definir la estructura de datos y la base de datos** mediante el modelado de entidades, atributos y relaciones, que luego se materializarán en esquemas reales con ORMs como Sequelize, Eloquent o Prisma, o en SQL puro.

-   **Crear contratos o interfaces de programación (en TypeScript, PHP, Java, etc.)**, garantizando que la implementación respete las reglas de negocio y la estructura de datos esperada.

-   **Guiar el diseño de flujos de interacción en la UI/UX**, asegurando que las pantallas y acciones del usuario correspondan fielmente a los casos de uso modelados.

-   **Redactar planes de prueba exhaustivos** (unitarias, integración, sistema y aceptación), puesto que cada requisito funcional o no funcional puede validarse mediante pruebas alineadas a los modelos.

-   **Permitir generación automática de código (scaffolding)** en herramientas y frameworks modernos, acelerando la creación de clases, controladores y modelos base.

-   **Facilitar la comunicación técnica entre todos los actores del proyecto**, minimizando malentendidos y omisiones gracias a una visión común y detallada de lo que se va a construir.

#### 🔸 **Casos de Uso (UML):**

Modelan las funcionalidades esperadas desde la perspectiva de los actores, permitiendo:

-   Definir límites claros del sistema.
-   Identificar roles, flujos de negocio y procesos.
-   Establecer base para contratos de API REST, rutas de front-end y flujos de navegación.

#### 🔸 **Historias de Usuario (Ágil):**

Recogen funcionalidades de manera simple y orientada a valor de negocio:

-   Guían la priorización de tareas en el backlog.
-   Sirven para establecer criterios de aceptación y validación.
-   Facilitan la comunicación con stakeholders no técnicos.

#### 🔸 **Diagramas de Clases (UML):**

Modelan las estructuras de datos, facilitando:

-   Diseño de bases de datos relacionales o NoSQL.
-   Implementación de modelos en backend.
-   Definición de relaciones (uno a muchos, muchos a muchos).
-   Generación automática de código en frameworks con scaffolding.

---

### 5. **Criterios de Calidad de Requisitos**

Para ser útiles, los requisitos deben ser:

-   **Completos**: No falta ningún aspecto relevante.
-   **Consistentes**: No se contradicen entre sí.
-   **No ambiguos**: Redactados con claridad.
-   **Verificables**: Se pueden comprobar.
-   **Rastreables**: Asociables a una necesidad o cambio de negocio.
-   **Factibles**: Técnicamente implementables.

---

### 6. **Validación y Verificación**

-   **Validación:** ¿El sistema propuesto resuelve el problema real del cliente?
-   **Verificación:** ¿Los requisitos están bien especificados, claros y sin errores?

---

### 7. **Errores Comunes en Análisis de Requisitos**

-   Asumir requisitos sin validación.
-   Ignorar requisitos no funcionales.
-   Escribir requisitos vagos o subjetivos.
-   No involucrar usuarios clave.
-   No definir criterios de aceptación.

---

### 8. **Importancia Estratégica del Análisis de Requisitos**

Un análisis de requisitos bien ejecutado permite:

✅ Definir con exactitud el alcance del sistema.

✅ Elaborar correctamente arquitecturas, interfaces y bases de datos.

✅ Seleccionar tecnología y patrones adecuados.

✅ Diseñar pruebas desde fases iniciales.

✅ Minimizar retrabajo, errores y sobrecostos.

✅ Mejorar comunicación entre equipo técnico, usuarios y negocio.

✅ Aumentar la calidad, escalabilidad y mantenibilidad del producto final.
