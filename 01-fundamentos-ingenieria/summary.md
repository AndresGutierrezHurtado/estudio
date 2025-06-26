# 📌 Módulo 1: Fundamentos de Ingeniería de Software

🔙 [Volver al inicio](../README.md)

La Ingeniería de Software no se trata únicamente de escribir código funcional, sino de aplicar principios, procesos y buenas prácticas que permitan construir soluciones de software confiables, mantenibles y escalables. Este módulo sienta las bases para entender cómo el desarrollo profesional de software va mucho más allá de saber usar un lenguaje o framework. Aquí se comienza a formar la mentalidad de un ingeniero, capaz de tomar decisiones técnicas fundamentadas y diseñar sistemas de calidad.

Aprender estos fundamentos te permitirá identificar qué hace que un software sea considerado “bien hecho”, y cómo lograrlo en tus propios proyectos.

---

## 🎯 Objetivo del módulo

Comprender qué es la Ingeniería de Software, sus diferencias con la programación tradicional, y conocer los principios fundamentales que guían la construcción de software de calidad, tales como la modularidad, la cohesión, el acoplamiento y la abstracción. Además, se introduce el proceso estructurado de desarrollo conocido como SDLC.

---

## ¿Qué es la Ingeniería de Software?

La Ingeniería de Software es la disciplina que se encarga del estudio, diseño, desarrollo, mantenimiento y gestión de sistemas de software, aplicando principios de la ingeniería.

**Características clave:**

-   Se enfoca en resolver problemas reales con soluciones sostenibles.
-   Considera aspectos técnicos, humanos, económicos y organizacionales.
-   Busca optimizar calidad, costo y tiempo de entrega.

### Definiciones Clásicas:

-   **IEEE**: "La aplicación de un enfoque sistemático, disciplinado y cuantificable al desarrollo, operación y mantenimiento del software".
-   **Sommerville**: “Disciplina de la ingeniería que se ocupa de todos los aspectos de la producción de software”.

---

## Características del Software

-   **Intangible**: No se puede tocar, es lógico, no físico.
-   **Desarrollo único**: No se ensambla en serie, cada sistema es único.
-   **Complejidad inherente**: Maneja lógica, reglas, procesos y datos diversos.
-   **Degradación sin desgaste físico**: El código no se daña con el tiempo, pero pierde calidad si no se mantiene.

---

## Importancia del Proceso en el Desarrollo

Aplicar procesos bien definidos permite construir software con:
- Mayor calidad y menos errores.
- Mejor mantenimiento y escalabilidad.
- Cumplimiento de plazos y presupuestos.
- Claridad en el trabajo en equipo.

### Riesgos de no usar procesos:
- Rehacer trabajo constantemente.
- Mala comunicación con el cliente.
- Aumento de la deuda técnica.
- Software inestable o difícil de mantener.

---

## 📐 Principios de calidad de software

Dominar estos principios es clave para construir software mantenible, entendible y de calidad profesional:

### 🔹 Modularidad

División del sistema en partes independientes que se puedan desarrollar y mantener de forma aislada. Ej: separar capas como backend, frontend, base de datos.

### 🔹 Abstracción

Ocultar los detalles internos y exponer solo lo necesario. Esto permite pensar en términos de interfaces y no de implementaciones.

### 🔹 Cohesión

Medida de cuán relacionados están los elementos dentro de un módulo. Alta cohesión significa que el módulo hace una sola cosa, y lo hace bien.

### 🔹 Acoplamiento

Grado de dependencia entre módulos. El objetivo es lograr **bajo acoplamiento**, para que los cambios en un módulo no rompan otros.

---

## Proceso de desarrollo de software (SDLC)

El **Software Development Life Cycle (SDLC)** es un marco que define las etapas por las que pasa un software desde su concepción hasta su retiro.

**Etapas típicas:**

1. **Análisis de requerimientos:** entender qué necesita el cliente.
2. **Diseño del sistema:** definir la estructura del software.
3. **Implementación:** codificar según el diseño.
4. **Pruebas:** validar que el sistema funcione correctamente.
5. **Despliegue:** poner el sistema en uso real.
6. **Mantenimiento:** corregir errores y mejorar el sistema con el tiempo.

---

## 🧠 Fundamentos computacionales esenciales

Para construir buen software, también es necesario comprender cómo funciona la computadora que lo ejecuta.

### 🔸 Bits y Bytes

-   Un **bit** es la unidad mínima de información, puede valer 0 o 1.
-   Un **byte** contiene 8 bits.
-   Todo en la memoria se representa como secuencias de bits: números, letras, imágenes, instrucciones.

### 🔸 Representación de datos

-   **Enteros:** Binario puro, con signo o sin signo.
-   **Caracteres:** Codificaciones como ASCII o UTF-8.
-   **Flotantes:** Representados mediante IEEE 754 (con parte entera, decimal y exponente).
-   **Booleanos:** 0 (falso) y 1 (verdadero).

### 🔸 Sistemas numéricos

-   Binario (base 2), Octal (base 8), Decimal (base 10), Hexadecimal (base 16).
-   Conversión entre ellos es útil para leer memoria, direcciones o interpretar datos binarios.

---

## ⚙️ Conceptos básicos de sistemas operativos

Aunque no desarrolles uno, es vital entender cómo afecta tu software.

### 🔸 Procesos e hilos

-   **Proceso:** instancia de un programa en ejecución.
-   **Hilo (thread):** subproceso dentro de un mismo proceso; comparte memoria.

### 🔸 Concurrencia y paralelismo

-   Concurrencia: múltiples tareas se gestionan a la vez (aunque no necesariamente se ejecuten al mismo tiempo).
-   Paralelismo: tareas realmente se ejecutan simultáneamente (CPU multinúcleo).

### 🔸 Otras ideas clave

-   **Syscalls:** Interacciones del software con el sistema operativo (abrir archivos, conectarse a red, etc.).
-   **Context switching:** Cambio de control entre procesos/hilos; tiene un costo.

---

## 🧮 Memoria y rendimiento

Comprender cómo se gestiona la memoria es clave para evitar errores y escribir código más eficiente.

### 🔸 Tipos de memoria

-   **RAM:** Memoria volátil de trabajo del sistema.
-   **ROM:** Memoria de solo lectura.
-   **Almacenamiento:** Discos duros, SSD, etc.

### 🔸 Stack vs Heap

-   **Stack:** Memoria automática, rápida, para variables locales.
-   **Heap:** Memoria dinámica, más flexible, pero más lenta y propensa a errores como fugas (leaks).

### 🔸 Recolección de basura (Garbage Collection)

-   Lenguajes como JavaScript, Java y Python la hacen automáticamente.
-   En C/C++, el manejo es manual.
