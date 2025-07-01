# 📌 Módulo 03: Análisis de Requisitos

🔙 [Volver al inicio](../README.md)

El análisis de requisitos es una etapa fundamental dentro del ciclo de vida del desarrollo de software (SDLC). Consiste en identificar, comprender, documentar y validar las necesidades y expectativas que tienen los usuarios, clientes y demás interesados respecto a un sistema informático. En esta fase se define qué debe hacer el sistema y bajo qué condiciones debe operar, antes de comenzar con el diseño o la codificación.

Su importancia radica en que un software solo es exitoso si realmente resuelve el problema para el que fue creado. Si los requisitos no se recolectan o interpretan correctamente, existe un alto riesgo de que el producto final no cumpla con lo que el cliente esperaba, lo que puede derivar en retrabajo, sobrecostos, retrasos e insatisfacción del usuario. Por esta razón, el análisis de requisitos se considera una actividad estratégica que impacta directamente en la calidad, funcionalidad, escalabilidad y mantenibilidad del software.

---

## 🎯 **Objetivo del Módulo**

Comprender y aplicar técnicas de levantamiento, análisis, documentación y gestión de requisitos de software, con el fin de asegurar que las soluciones desarrolladas respondan correctamente a las necesidades reales de los usuarios y del negocio.

Este módulo busca formar una base sólida en la identificación de requisitos funcionales y no funcionales, el uso de herramientas de modelado como casos de uso e historias de usuario, y la trazabilidad de requisitos a lo largo del ciclo de vida del software. Así, se minimizan errores costosos en etapas posteriores del proyecto y se mejora la calidad del producto final.

---

## 📝 **Conceptos Fundamentales**

El análisis de requisitos define con precisión **qué debe hacer el sistema** y **bajo qué condiciones debe funcionar**, evitando malinterpretaciones que podrían conducir a la construcción de un producto que no resuelve el problema real del cliente.

A continuación, se presentan los conceptos clave que conforman esta fase crítica:

-   **Requisito:** Un requisito es una descripción documentada de una propiedad, capacidad, restricción o comportamiento que el sistema debe satisfacer para cumplir con las necesidades del usuario, del negocio o del entorno operativo.

-   **Criterios de calidad:** Para que un requisito sea útil, debe cumplir con ciertas características. Los criterios más aceptados son:

    -   **Correcto:** Refleja lo que el cliente necesita.
    -   **Completo:** No deja ambigüedades ni lagunas.
    -   **Consistente:** No contradice otros requisitos.
    -   **Comprensible:** Está redactado de manera clara para todos los involucrados.
    -   **Verificable:** Se puede comprobar si se ha cumplido mediante pruebas o inspección.
    -   **Trazable:** Se puede seguir su relación con elementos del diseño, desarrollo y pruebas.
    -   **Modificable:** Está organizado y redactado de forma que sea fácil de cambiar sin afectar negativamente al resto.

-   **Validación y Verificación:**

    -   **Validación:** Asegura que los requisitos representan fielmente las necesidades y expectativas del cliente. Pregunta clave: _¿Estamos construyendo el sistema correcto?_
    -   **Verificación:** Se enfoca en comprobar que los requisitos han sido implementados correctamente. Pregunta clave: _¿Estamos construyendo el sistema de la manera correcta?_

---

## 🧩 Tipos de Requisitos

### Requisitos Funcionales (RF)

Los requisitos funcionales definen **las funcionalidades específicas que el sistema debe ofrecer** para satisfacer las necesidades del usuario o del negocio. Es decir, describen **qué debe hacer el sistema**, cómo debe comportarse ante determinadas entradas y cómo debe responder ante ciertas condiciones.

Son la base para diseñar la lógica de negocio, construir las interfaces de usuario y definir los casos de prueba funcionales.

**Ejemplos:**

-   Autenticación y autorización de usuarios.
-   Registro y gestión de productos.
-   Generación de reportes en PDF.
-   Envío automático de notificaciones por correo electrónico.

### Requisitos No Funcionales (RNF)

Los requisitos no funcionales describen **las restricciones, atributos de calidad o condiciones bajo las cuales el sistema debe operar**. No se refieren a lo que hace el sistema, sino **a cómo lo hace**: su rendimiento, escalabilidad, seguridad, usabilidad, disponibilidad, entre otros.

**Ejemplos:**

-   Procesar al menos 1000 transacciones por segundo.
-   La aplicación debe estar disponible 24/7 con un 99.9% de uptime.
-   Cumplir con los estándares OWASP para evitar vulnerabilidades comunes.
-   Interfaz accesible para personas con discapacidad visual (WCAG 2.1).

### Requisitos de Dominio

Son aquellos requisitos **específicos del área o sector donde se aplicará el software**. Representan reglas de negocio, normativas, políticas internas o flujos propios del entorno del cliente. Suelen provenir de expertos en la materia y reflejan conocimientos que no son genéricos, sino particulares de un contexto determinado.

**Ejemplos:**

-   En el sector bancario: las transferencias mayores a \$10,000 deben requerir doble autenticación y validación por parte de un supervisor.
-   En salud: los historiales clínicos deben mantenerse por mínimo 10 años según regulación nacional.
-   En educación: un curso no puede comenzar si no hay al menos 5 estudiantes matriculados.

---

## Técnicas de Levantamiento de Requisitos

Se aplican métodos como entrevistas, encuestas, prototipos y análisis de documentación para extraer información precisa de stakeholders y usuarios finales.

### Preguntas clave para descubrir los Requisitos Funcionales (RF)

**Sobre el propósito del sistema:**

-   ¿Cuál es el objetivo principal del sistema?
-   ¿Qué problema actual quiere resolver?
-   ¿Qué procesos del negocio quiere automatizar o digitalizar?

**Sobre los usuarios del sistema:**

-   ¿Qué tipos de usuarios existirán? (Ej: administrador, cliente, proveedor)
-   ¿Qué puede hacer cada tipo de usuario? (permisos, restricciones)
-   ¿Qué flujo realiza un usuario típico desde que entra hasta que finaliza una acción?

**Sobre las funcionalidades esperadas:**

-   ¿Qué operaciones básicas debe permitir el sistema? (CRUD)
-   ¿Se requieren reportes, estadísticas o exportación de datos?
-   ¿Debe tener notificaciones? ¿Emails? ¿WhatsApp? ¿SMS?
-   ¿El sistema debe integrarse con otros sistemas externos? (Ej: pasarelas de pago, APIs)

### 🔐 Preguntas clave para descubrir los Requisitos No Funcionales (RNF)

**Sobre rendimiento:**

-   ¿Cuántos usuarios simultáneos se esperan?
-   ¿Cuál es el tiempo máximo de respuesta aceptable?

**Sobre seguridad:**

-   ¿Qué mecanismos de autenticación y autorización se necesitan?
-   ¿Se requiere encriptación de datos?
-   ¿Cómo se garantizará la privacidad de los datos personales? (Ej: cumplimiento RGPD)
-   ¿Debe registrarse el historial de actividades o auditoría de cambios?

**Sobre disponibilidad:**

-   ¿El sistema debe estar disponible 24/7 o se permiten horarios de mantenimiento?
-   ¿Se requiere alta disponibilidad, tolerancia a fallos o backups automáticos?

**Sobre escalabilidad:**

-   ¿Se prevé un aumento en el número de usuarios o volumen de datos?
-   ¿El sistema será utilizado a nivel local, nacional o internacional?

**Sobre usabilidad:**

-   ¿Qué nivel de facilidad de uso se espera?
-   ¿La interfaz debe ser moderna, adaptable a dispositivos móviles?
-   ¿Se requiere soporte multilenguaje?

---

## Modelado de Requisitos

El modelado representa visual y estructuradamente los requisitos para facilitar su comprensión, validación e implementación. Estos modelos no son solo documentación pasiva; son herramientas activas que permiten:

-   **Diseñar la arquitectura técnica y la lógica de negocio**, definiendo los componentes del backend.
-   **Definir la estructura de datos y bases de datos**, modelando entidades, atributos y relaciones.
-   **Crear contratos o interfaces de programación**, asegurando que la implementación respete las reglas de negocio.
-   **Guiar el diseño de flujos de interacción en la UI/UX**, asegurando que correspondan a los casos de uso.
-   **Redactar planes de prueba exhaustivos**, alineando cada prueba a un requisito documentado.
-   **Permitir generación automática de código (scaffolding)** en frameworks modernos.
-   **Facilitar la comunicación técnica entre los actores del proyecto**, minimizando omisiones o malentendidos.

### Casos de Uso (UML)

Los casos de uso representan **escenarios en los que un usuario (actor) interactúa con el sistema para lograr un objetivo específico**. Este modelo describe las funcionalidades del sistema **desde la perspectiva del usuario**, ayudando a comprender qué debe hacer el software sin entrar en detalles técnicos.

-   Definen los **límites funcionales del sistema** y sus interacciones con actores externos.
-   Identifican **roles del usuario, procesos clave y flujos de negocio**.
-   Son útiles como base para **definir endpoints de APIs, rutas de frontend y reglas de navegación** en la interfaz de usuario.
-   Se representan gráficamente mediante **diagramas de casos de uso**, útiles tanto para técnicos como para stakeholders.

---

### Historias de Usuario (Ágil)

Las historias de usuario son una técnica ágil para **expresar funcionalidades desde la perspectiva del usuario final**, enfocándose en el valor que aportan al negocio. Su estructura suele ser simple: _“Como [rol], quiero [funcionalidad], para [beneficio]”_.

-   Ayudan a **priorizar el desarrollo** en función del valor entregado al cliente.
-   Establecen **criterios de aceptación claros**, que permiten validar cuándo una funcionalidad está completa.
-   Facilitan la comunicación entre desarrolladores, testers y stakeholders **no técnicos**, reduciendo ambigüedades.
-   Se agrupan en épicas y se gestionan dentro del **product backlog**.

---

### Diagramas de Clases (UML)

Los diagramas de clases describen **la estructura estática del sistema**, representando clases, atributos, métodos y las relaciones entre ellas (herencia, asociación, composición, etc.). Son especialmente útiles durante el diseño orientado a objetos.

-   Ayudan a **modelar las entidades y sus relaciones** en el dominio del problema.
-   Sirven como base para el diseño de **bases de datos relacionales o NoSQL**.
-   Permiten implementar modelos de datos en el backend y generar código automáticamente mediante **scaffolding**.
-   Facilitan la identificación de estructuras como **agregados, entidades y value objects**, fundamentales en arquitecturas como DDD.
