# 📌 Módulo 2: Paradigmas de Programación

🔙 [Volver al inicio](../README.md)

Los **paradigmas de programación** son los distintos enfoques que se utilizan para pensar, estructurar y escribir código. Cada paradigma propone una forma particular de resolver problemas, organizar las instrucciones y gestionar los datos dentro de un programa.

Conocer los principales paradigmas te permite entender cómo funcionan los lenguajes que usas y te prepara para aprender nuevos con mayor facilidad. Además, te ayuda a tomar mejores decisiones técnicas al desarrollar software, eligiendo el estilo de programación que mejor se adapte a cada situación.

---

## 🎯 Objetivo del módulo

Comprender los principales enfoques que existen para programar, reconociendo sus características, ventajas y limitaciones.

Al finalizar este módulo, estarás en capacidad de aplicar conscientemente paradigmas como el imperativo, orientado a objetos, funcional o declarativo, según el problema a resolver, el lenguaje utilizado y los requisitos del proyecto. Esto te permitirá escribir código más claro, flexible y mantenible.

---

## 🧠 ¿Por qué es importante conocer los paradigmas?

Entender los paradigmas de programación no solo amplía tu visión como desarrollador, sino que también mejora tu capacidad para aprender nuevos lenguajes, resolver problemas de forma más efectiva y escribir código más limpio y mantenible.

Cada lenguaje tiene uno o varios paradigmas que influencian su estilo de desarrollo. Conocer estos enfoques te permite adaptarte rápidamente a distintos entornos de trabajo, comprender código legado escrito en otros estilos y elegir conscientemente el enfoque que mejor se alinee con los requisitos del proyecto o equipo.

Además, los paradigmas te ayudan a pensar en términos más abstractos y a estructurar tus soluciones de forma más clara, lo que mejora tanto tu código como tu comunicación técnica.

---

## Paradigmas de programacion

### Paradigma Imperativo

El paradigma imperativo se basa en dar instrucciones paso a paso para modificar el estado del programa. Es como decirle al computador exactamente qué hacer y en qué orden. Este enfoque permite un control detallado del flujo de ejecución mediante estructuras como condiciones, bucles y secuencias de instrucciones.

Es la base de muchos lenguajes populares y el estilo más cercano a cómo funciona el hardware. Lenguajes como C, JavaScript o Python utilizan este paradigma en su forma más directa.

### Paradigma Declarativo

En la programación declarativa se enfoca en describir _qué_ se quiere lograr, sin especificar exactamente _cómo_ hacerlo. Esto permite mayor abstracción y legibilidad del código, ya que se delega al lenguaje o motor de ejecución los detalles del procedimiento.

Dentro de este paradigma se encuentran subenfoques importantes como la **programación funcional**, que promueve el uso de funciones puras, sin efectos secundarios ni mutaciones; y la **programación lógica**, que define hechos y reglas para resolver problemas mediante inferencias.

Ejemplos de lenguajes o tecnologías declarativas incluyen SQL, HTML, Haskell y frameworks como React, que usa JSX para declarar interfaces.

### Paradigma Orientado a Objetos (OOP)

La programación orientada a objetos organiza el código en torno a entidades llamadas objetos, que combinan datos (atributos) y comportamiento (métodos). Este paradigma permite modelar el software como un conjunto de objetos que interactúan entre sí, imitando el mundo real.

Sus pilares fundamentales son la encapsulación, la herencia, el polimorfismo y la abstracción. Es muy útil para proyectos grandes y mantenibles, especialmente en el desarrollo de aplicaciones web, móviles y de escritorio.

Lenguajes como Java, C#, PHP, Python y TypeScript aplican este paradigma de forma extensiva.

### Paradigma Funcional (detallado)

El paradigma funcional, aunque es una forma de programación declarativa, merece una sección aparte por su creciente relevancia. Se basa en el uso de funciones puras, sin efectos secundarios, y en el manejo de datos inmutables.

Una de sus ventajas principales es la facilidad para razonar sobre el código, ya que cada función siempre produce el mismo resultado para los mismos argumentos. También permite componer funciones y aplicar técnicas como la recursión en lugar de bucles.

Lenguajes como Haskell, Elixir y Scala lo aplican de forma nativa, mientras que otros como JavaScript o Python permiten aplicarlo parcialmente. Tecnologías modernas como React, Redux y RxJS se apoyan fuertemente en estos principios.

### Paradigma Lógico

La programación lógica se basa en la lógica matemática. En lugar de definir pasos para resolver un problema, se describen hechos y reglas, y el sistema deduce las respuestas a partir de ellos mediante inferencia lógica.

Este paradigma es útil en inteligencia artificial, sistemas expertos y problemas donde se requiere encontrar soluciones a partir de un conjunto de condiciones conocidas.

Un lenguaje representativo es **Prolog**, que permite definir relaciones entre datos y consultarlas de forma declarativa.

---

## 🔍 Comparativa general de paradigmas

| Paradigma           | Enfoque principal            | Control del flujo       | Lenguajes comunes            | Ventajas principales               |
| ------------------- | ---------------------------- | ----------------------- | ---------------------------- | ---------------------------------- |
| Imperativo          | Instrucciones paso a paso    | Explícito               | C, Python, JavaScript        | Simplicidad, control total         |
| Declarativo         | Qué se desea lograr          | Implícito               | SQL, HTML, Haskell           | Legibilidad, enfoque abstracto     |
| Orientado a Objetos | Objetos y relaciones         | A través de métodos     | Java, C#, Python, TypeScript | Escalabilidad, reutilización       |
| Funcional           | Funciones puras e inmutables | Composición y recursión | Haskell, Scala, JavaScript   | Facilidad de pruebas, concurrencia |
| Lógico              | Reglas y hechos              | Inferencia lógica       | Prolog                       | Resolución automática de problemas |

---

## 🧰 ¿Cuándo usar cada paradigma?

-   Usa programación **imperativa** cuando necesites control detallado del flujo, especialmente en scripts, automatizaciones o tareas de bajo nivel.
-   Aplica **OOP** cuando trabajes en sistemas complejos y mantenibles, como aplicaciones grandes que evolucionarán en el tiempo.
-   Prefiere el enfoque **funcional** cuando busques claridad, inmutabilidad y facilidad para pruebas, especialmente en procesamiento de datos o componentes puros (como en React).
-   Considera la **programación lógica** en sistemas de inteligencia artificial o motores de reglas, donde la lógica de negocio se expresa como conocimiento.

No se trata de elegir _uno_, sino de dominar _varios_ y aplicarlos con criterio.
