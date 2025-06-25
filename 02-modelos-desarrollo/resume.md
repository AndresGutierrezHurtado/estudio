# 📌 Módulo 2: Modelos de Desarrollo de Software

Los modelos de desarrollo de software son como "guias" o "caminos" que definen cómo se estructura, organiza y gestiona el proceso de creación de un producto software. Estos modelos establecen las fases, actividades y entregables que deben cumplirse en un proyecto, permitiendo adaptar el desarrollo a las necesidades del cliente, el equipo y el contexto de negocio.

El uso de un modelo de desarrollo adecuado ayuda a reducir riesgos, mejorar la planificación, garantizar la calidad del producto y facilitar la comunicación entre los distintos actores del proyecto. Conocer estos modelos permite a un desarrollador adaptarse a diferentes entornos de trabajo y metodologías, desde enfoques tradicionales hasta los más ágiles y modernos.

---

## 🎯 Objetivo

Identificar y comprender los distintos modelos de desarrollo de software, sus principios, enfoques, fortalezas, limitaciones y escenarios de uso. Esto permitirá evaluar de manera crítica cada modelo y seleccionar el más adecuado según las características y necesidades específicas de un proyecto, optimizando la planificación, reduciendo riesgos, asegurando la calidad del producto final y facilitando la adaptación a diferentes entornos laborales o metodologías de trabajo.

---

## 🔮 Modelos Predictivos

Son modelos secuenciales, donde las etapas del desarrollo están bien definidas y deben completarse una tras otra. Se utilizan en proyectos con requisitos estables y bien conocidos desde el inicio.

Se utilizan cuando el cliente sabe con exactitud lo que necesita desde el inicio.
Sin embargo, estos modelos presentan dificultades para adaptarse a modificaciones o correcciones surgidas en etapas avanzadas, lo que puede aumentar el riesgo si se detectan errores tarde.

### Modelo en Cascada (Waterfall)

El modelo en cascada es una metodología de desarrollo de software de tipo secuencial. Su principio básico consiste en que cada fase del proyecto debe completarse en su totalidad antes de iniciar la siguiente. Esto asegura un flujo ordenado y estructurado, pero también limita la flexibilidad del proceso.

-   **Fases:** Requisitos → Diseño → Implementación → Verificación → Mantenimiento.
-   **Ventajas:** Es un modelo simple de comprender y aplicar, facilita la generación de documentación clara y detallada en cada etapa.
-   **Desventajas:** Presenta dificultad para adaptarse a cambios una vez iniciada la ejecución; si se detectan errores en etapas avanzadas, corregirlos implica un alto costo y riesgo para el proyecto.

![Diagrama del modelo en cascada](https://miro.medium.com/v2/resize:fit:478/1*2UcWBItGxECz1i-AxkLh2w.jpeg)

### Modelo en V (V-Model)

El modelo en V es una evolución del modelo en cascada que introduce actividades explícitas de verificación y validación en cada fase del ciclo de desarrollo. La **verificación** consiste en comprobar que cada fase se haya ejecutado correctamente según los estándares y métodos definidos, mientras que la **validación** garantiza que el producto final cumpla con los requisitos esperados por el cliente o usuario.

-   **Ventajas:** Proporciona un mayor enfoque en la calidad del producto final, ya que la validación y verificación se consideran desde el inicio del proceso.
-   **Desventajas:** Comparte la misma rigidez que el modelo en cascada, lo que lo hace poco adaptable frente a cambios imprevistos o modificaciones en los requisitos.

![Diagrama del modelo en v](https://visuresolutions.com/wp-content/uploads/2025/01/V-Model-1024x690.png)

---

## ♻️ Modelos Iterativos e Incrementales

Los modelos iterativos e incrementales se basan en la construcción gradual del producto mediante versiones sucesivas o prototipos. En cada ciclo, se entrega una versión parcial o funcional del sistema que es evaluada y mejorada con base en la retroalimentación obtenida.

Este enfoque es ideal para proyectos donde los requisitos no están completamente definidos desde el inicio o pueden cambiar durante el desarrollo. Su principal fortaleza radica en la capacidad de adaptarse rápidamente a nuevas necesidades del cliente y en la detección temprana de errores, lo que permite reducir riesgos de manera significativa.

### Modelo de Prototipos

El modelo de prototipos se centra en la creación de versiones preliminares del producto que permiten visualizar, probar y validar funcionalidades con los usuarios finales antes de desarrollar la solución definitiva. Estos prototipos sirven para aclarar requisitos, mejorar la comprensión del sistema y ajustar expectativas entre el equipo de desarrollo y el cliente.

-   **Ventajas:** Ayuda a reducir el riesgo de malentendidos o interpretaciones erróneas de los requisitos del cliente, ya que permite obtener retroalimentación directa desde las primeras etapas.
-   **Desventajas:** Si no se comunica claramente que se trata solo de un prototipo, puede generar en el cliente expectativas irreales sobre el estado real del producto.

![Diagrama modelo de prototipos](https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj0odYfkmlvpzRhoWVg5NSHM_HPYQpZmMFEfSWf4rX8SE2vrFGM51sDKsfEBHaFd4uT54VnEUUwTIpPeC5prZpgElTnWeCm_6xthroMSiNeKxQUJG3pkJszkv_IsHer2h1Z2iMtgUCv-Zg/w1200-h630-p-k-no-nu/prototipo.jpg)

### Modelo en Espiral

El modelo en espiral combina características del modelo en cascada y de los modelos iterativos, incorporando además un fuerte enfoque en la gestión de riesgos. Cada ciclo de la espiral incluye actividades de planificación, análisis de riesgos, desarrollo y evaluación, lo que permite ajustar continuamente el proceso en función de los resultados obtenidos y los riesgos identificados.

-   **Ventajas:** Es especialmente adecuado para proyectos complejos, de gran envergadura o con alta incertidumbre, ya que permite una gestión constante de riesgos y un desarrollo flexible.
-   **Desventajas:** Su aplicación implica mayores costos y tiempos de desarrollo debido a la necesidad de realizar análisis y planificaciones detalladas en cada ciclo.

![Diagrama modelo en espiral](https://www.researchgate.net/publication/310772154/figure/fig3/AS:670705091883010@1536919963317/Figura-44-El-modelo-en-espiral.png)

---

## ⚡ Modelos Ágiles

Los modelos ágiles se enfocan en la **flexibilidad**, la **adaptación al cambio** y la **entrega continua de valor** al cliente.  
A diferencia de los enfoques predictivos o estrictamente planificados, los modelos ágiles permiten que los requisitos evolucionen de manera constante, incluso en etapas avanzadas del desarrollo. Esto los hace especialmente adecuados para proyectos donde los requerimientos no están completamente definidos desde el inicio o pueden cambiar según las necesidades del negocio o del cliente.

En este enfoque, los equipos de trabajo colaboran estrechamente con el cliente, fomentando la comunicación directa y continua, para garantizar que el producto final refleje realmente lo que se necesita.  
El trabajo se organiza en **ciclos cortos e iterativos** (conocidos como iteraciones o sprints) en los cuales se entrega una versión funcional y mejorada del producto, lista para ser evaluada y ajustada con base en el feedback recibido.

El uso de modelos ágiles ayuda a reducir riesgos, detectar problemas de manera temprana, adaptarse a nuevas prioridades y maximizar el valor entregado al cliente en cada iteración.

### Scrum

Scrum es una metodología ágil enfocada en la entrega incremental y continua de valor a través de iteraciones cortas llamadas **Sprints**, que suelen tener una duración de 2 a 4 semanas. Durante cada Sprint, el equipo trabaja en un conjunto específico de tareas priorizadas. Las reuniones diarias llamadas **Daily Scrum** permiten al equipo coordinarse, detectar bloqueos y ajustar su trabajo de manera eficiente.

**Roles principales en Scrum:**

-   **Product Owner:** Responsable de definir y priorizar los requisitos del producto (Product Backlog).
-   **Scrum Master:** Facilita el proceso Scrum, elimina impedimentos y asegura el cumplimiento de la metodología.
-   **Development Team:** Equipo encargado de diseñar, construir, probar e implementar el incremento de producto.

**Términos clave:**

-   **Sprint Backlog:** Conjunto de tareas seleccionadas para el Sprint actual.
-   **Incremento:** Producto funcional entregable al final de cada Sprint.
-   **Retrospective:** Reunión posterior al Sprint para evaluar y mejorar el proceso.

-   **Ventajas:** Alta capacidad de adaptación a cambios, fuerte orientación a la entrega de valor real para el negocio, mejora continua del equipo.
-   **Desventajas:** Requiere un alto nivel de compromiso y disciplina tanto del equipo como del cliente; su éxito depende en gran medida de la colaboración constante.

![Diagrama Scrum](https://www.arrobasolutions.com/wp-content/uploads/2020/04/metodologia-scrum-esquema.gif)

### Kanban

Kanban es una metodología ágil que se enfoca en la mejora continua del flujo de trabajo y en la eliminación de actividades que no aportan valor. Utiliza un tablero visual (Kanban Board) donde cada columna representa una etapa del proceso de desarrollo, como: **Requisitos, Diseño, Implementación, Pruebas, Despliegue, Mantenimiento**.

Esta técnica promueve la visualización de tareas, la limitación del trabajo en progreso (**WIP: Work In Progress**) y la identificación de cuellos de botella, fomentando la colaboración y la comunicación constante entre los miembros del equipo.

-   **Ventajas:** Método simple de implementar, facilita la detección y resolución de problemas en el flujo de trabajo, promueve la mejora continua y ofrece alta visibilidad del estado de las tareas.
-   **Desventajas:** Al ser menos estructurado que Scrum, no define roles específicos ni planificación estricta, lo que puede dificultar su aplicación en equipos que requieren más guía o dirección.

![Diagrama Kanban](https://www.master-malaga.com/wp-content/uploads/2015/07/tablero-kanban-714x246.png)

### Extreme Programming (XP)

Extreme Programming (XP) es una metodología ágil orientada a la entrega rápida y continua de software de alta calidad. Se basa en una serie de prácticas técnicas rigurosas que buscan maximizar la eficiencia del equipo de desarrollo y asegurar la calidad del producto. Entre estas prácticas destacan: **Pair Programming (programación en parejas)**, **Test-Driven Development (desarrollo guiado por pruebas)** y la **integración continua**.

XP fomenta una comunicación constante con el cliente, la simplicidad en el diseño y la capacidad de adaptación ante cambios frecuentes en los requisitos.

-   **Ventajas:** Asegura un alto nivel de calidad técnica en el código, fomenta el feedback rápido y continuo, y mejora la capacidad de respuesta a cambios.
-   **Desventajas:** Su adopción puede ser difícil en equipos con poca madurez técnica o sin una cultura de desarrollo colaborativo y disciplinado.

![Diagrama XP](https://www.researchgate.net/publication/316976788/figure/fig1/AS:646073588645888@1531047355074/P-methodology-Source-Gonzalez-C-2012-Traduccion-de-la-imagen-XP-aplicado-Applied.png)

---

## Trade-Offs

Un **trade-off** es una decisión técnica que implica **aceptar una desventaja a cambio de obtener una ventaja**.  
En el desarrollo de software, **no existe una solución perfecta para todos los contextos**: elegir un modelo de desarrollo significa equilibrar prioridades como velocidad, calidad, flexibilidad, costo y control.

Comprender los trade-offs de cada enfoque permite tomar decisiones más informadas, adaptadas al contexto real del proyecto, equipo y negocio.  
Cada modelo de desarrollo tiene fortalezas, pero también sacrifica ciertos beneficios en favor de otros. Este análisis es clave para elegir la estrategia más adecuada.

A continuación, se presentan los **principales modelos de desarrollo** con sus ventajas, desventajas, escenarios recomendados y el trade-off que representan.

| Modelo             | Ventajas                                                                                                                        | Desventajas                                                                                                    | Cuándo usarlo                                                                                    | Trade-Off                                                                                          |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------------------------- |
| Cascada            | Estructura clara y fases bien definidas. Buena documentación. Ideal para requisitos estables. Facilita planificación y control. | Rígido ante cambios. Feedback tardío. Puede ocultar errores hasta etapas finales.                              | Proyectos con requisitos estables (ej. sistemas militares, hardware, proyectos gubernamentales). | Ganas orden y control, pero pierdes flexibilidad y adaptabilidad a cambios.                        |
| V-Model            | Refuerza calidad al integrar pruebas desde el diseño. Claridad en verificación y validación. Útil en sistemas críticos.         | Rígido, costoso y lento. Poco adecuado para cambios frecuentes.                                                | Proyectos donde la validación rigurosa es crítica (ej. salud, banca, aviación).                  | Ganas calidad y validación estructurada, pero pierdes velocidad y capacidad de respuesta.          |
| Prototipos         | Feedback temprano. Ayuda a descubrir requisitos ocultos. Enfocado en el usuario.                                                | Riesgo de que el prototipo se convierta en el sistema real. Puede descuidar la calidad o arquitectura.         | Proyectos con incertidumbre en los requisitos o validación temprana con el usuario.              | Ganas validación temprana, pero puedes sacrificar robustez si se convierte en producto final.      |
| Espiral            | Identificación de riesgos. Adaptabilidad. Iteración controlada. Enfoque en calidad progresiva.                                  | Complejo de implementar. Costoso. Requiere experiencia para gestionar bien los ciclos.                         | Proyectos grandes o críticos con alta incertidumbre y necesidad de gestionar riesgos.            | Ganas control de riesgos y adaptabilidad, pero pierdes simplicidad y velocidad de entrega.         |
| Scrum              | Alta adaptabilidad. Entregas frecuentes. Feedback continuo. Mejora continua. Ideal para equipos colaborativos.                  | Requiere disciplina. Reuniones constantes. Puede haber sobrecarga si no se gestiona bien.                      | Proyectos dinámicos, colaborativos, con cambios frecuentes. Equipos con buena comunicación.      | Ganas agilidad y mejora continua, pero pierdes control estricto sobre planificación a largo plazo. |
| Kanban             | Flujo continuo. Visualización clara del trabajo. Flexibilidad total. Bajo overhead de gestión.                                  | Falta de estructura temporal. Difícil medir entregables si no se combina con otros métodos.                    | Entornos con mantenimiento continuo o equipos que ya tienen experiencia y disciplina.            | Ganas flexibilidad y enfoque en flujo, pero pierdes control sobre fechas o hitos definidos.        |
| XP (Extreme Prog.) | Fomenta calidad del código. Pruebas automáticas. Comunicación constante. Reducción de errores y alta satisfacción del cliente.  | Alta demanda técnica. Difícil de escalar. Puede no ser adecuado en equipos grandes o con baja madurez técnica. | Equipos pequeños, altamente técnicos, donde la calidad y rapidez son prioridades.                | Ganas calidad y velocidad con disciplina, pero pierdes escalabilidad y estructura formal.          |

---

## ♾️ DevOps

DevOps no es simplemente un modelo de desarrollo adicional, sino una filosofía integral que transforma la manera en que los equipos de **Desarrollo (Dev)** y **Operaciones (Ops)** colaboran para crear, entregar y mantener software de alta calidad de forma rápida, confiable y continua.

Se basa en un conjunto de prácticas enfocadas en la **automatización de procesos clave** como el testing, la construcción (**build**) y el despliegue (**deploy**) de aplicaciones, con el objetivo de mejorar la eficiencia y reducir errores humanos en las tareas repetitivas.

A diferencia de los enfoques tradicionales —donde las áreas de desarrollo, pruebas y operación trabajan de forma separada—, DevOps propone una integración constante entre estas disciplinas. Este enfoque promueve la **colaboración activa**, la automatización de flujos de trabajo y la mejora continua durante todo el ciclo de vida del software. Su adopción permite resolver desafíos comunes como retrasos en las entregas, fallos en entornos productivos, poca visibilidad de los procesos y dificultades para escalar aplicaciones de manera eficiente.

![Diagrama DevOps](https://cacoo.com/wp-app/uploads/2021/06/continuous-development-visual.png)

### 🔑 Conceptos Clave de DevOps

-   **CI (Integración Continua):**  
    Es el proceso mediante el cual los desarrolladores integran frecuentemente su código en un repositorio compartido (por ejemplo, en GitHub). Cada vez que se detecta un cambio, un servidor de CI ejecuta automáticamente un conjunto de tareas definidas en un workflow, como la construcción del proyecto (**build**) y la ejecución de pruebas automáticas (**testing**), con el fin de garantizar que el código es funcional y no introduce errores. Los resultados de estas pruebas son notificados a los desarrolladores, y el código es inspeccionado principalmente por el **Product Owner** o el equipo de **QA**.

-   **CD (Entrega Continua / Despliegue Continuo):**  
    **CD** tiene dos posibles significados dentro de DevOps:

    1. **Continuous Delivery (Entrega Continua):**  
       El código que ha pasado todas las pruebas de CI queda listo para ser desplegado manualmente en producción. Esto permite al equipo decidir el momento exacto en que desea hacer el despliegue.

    2. **Continuous Deployment (Despliegue Continuo):**  
       El código que ha pasado las pruebas se despliega automáticamente en el entorno de producción sin intervención humana. Esto permite entregar nuevas versiones de forma continua y sin retrasos.

    Ambos enfoques buscan reducir riesgos, disminuir esfuerzo manual y permitir entregas frecuentes y confiables del software.
    era frecuente, con menor riesgo y sin intervención manual, garantizando que los cambios sean confiables, probados y listos para su uso.

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
