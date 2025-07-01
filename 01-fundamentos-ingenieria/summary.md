# 📌 Módulo 1: Fundamentos de Ingeniería de Software

🔙 [Volver al inicio](../README.md)

La Ingeniería de Software es mucho más que programar. Se trata de aplicar principios técnicos y metodológicos para construir sistemas que sean funcionales, mantenibles, escalables y alineados con necesidades reales.

En este módulo se presentan los fundamentos teóricos y prácticos que todo desarrollador profesional debe comprender antes de escribir una sola línea de código. No solo se abordan las bases de la disciplina de ingeniería, sino también los conceptos computacionales esenciales que influyen directamente en cómo se diseña y ejecuta el software.

---

## 🎯 Objetivo del módulo

Comprender los principios fundamentales de la Ingeniería de Software, diferenciando claramente entre programación y desarrollo profesional de software. El módulo introduce conceptos esenciales como **modularidad**, **acoplamiento**, **cohesión** y **abstracción**, y presenta el **ciclo de vida del desarrollo de software (SDLC)** como una guía estructurada para crear soluciones efectivas.

Además, se exploran los fundamentos computacionales necesarios para el diseño de sistemas, tales como:

-   La representación de datos mediante **bits y bytes**.
-   El funcionamiento básico del **hardware y los sistemas operativos**.
-   Las bases de **redes e internet** para entender cómo interactúan los sistemas distribuidos.
-   El rol de los **archivos, formatos de almacenamiento y bases de datos** en el ciclo de vida del software.

Este conocimiento servirá como punto de partida para tomar decisiones técnicas fundamentadas y adoptar una mentalidad de ingeniero orientado a la calidad.

---

## 🧱 ¿Qué es la Ingeniería de Software?

La Ingeniería de Software es una disciplina dentro de la ingeniería que se dedica al diseño, construcción, implementación y mantenimiento de sistemas de software que cumplan con estándares de calidad, eficiencia, seguridad y escalabilidad.

Un ingeniero o ingeniera de software **no solo programa**: analiza problemas complejos del mundo real, propone soluciones sostenibles, diseña arquitecturas, coordina equipos, gestiona riesgos, se comunica con clientes y toma decisiones técnicas alineadas con objetivos del negocio.

Entre sus responsabilidades están:

-   Levantar y analizar requerimientos de usuarios.
-   Diseñar la estructura lógica del software.
-   Elegir las tecnologías adecuadas para el proyecto.
-   Implementar soluciones de forma estructurada y profesional.
-   Asegurar la calidad del código mediante pruebas automatizadas o manuales.
-   Prever y planear el mantenimiento a largo plazo del software.
-   Considerar escalabilidad, seguridad, accesibilidad y experiencia de usuario.
-   Comunicar decisiones técnicas a personas no técnicas (clientes, líderes, etc.).

### ¿Por qué es importante este rol?

Vivimos en una sociedad digital. Desde aplicaciones bancarias y sistemas de salud hasta plataformas educativas y herramientas de accesibilidad, **todo se construye con software**. Sin embargo, que una aplicación funcione no significa que esté bien hecha.

Un software mal diseñado puede causar:

-   Pérdidas económicas millonarias.
-   Filtraciones de datos personales o bancarios.
-   Malas experiencias de usuario (frustración, errores).
-   Inaccesibilidad para personas con discapacidades.
-   Retrabajo constante y equipos desgastados.

Ahí entra la Ingeniería de Software: para **garantizar que el software no solo funcione, sino que lo haga bien, de forma mantenible, ética y escalable**. Así, se convierte en una profesión con una **enorme responsabilidad social**.

---

## 💻 ¿Cómo funcionan las computadoras?

Para desarrollar software de calidad, es fundamental entender cómo funciona la máquina que lo ejecuta. Las computadoras son **máquinas electrónicas programables** que procesan información mediante una interacción constante entre el hardware y el software.

Conocer su funcionamiento interno permite al ingeniero o ingeniera de software:

-   Escribir código más eficiente y consciente del uso de recursos.
-   Detectar y prevenir errores complejos como fugas de memoria o cuellos de botella.
-   Tomar decisiones técnicas fundamentadas (por ejemplo, al elegir entre almacenar datos en RAM o en disco).
-   Diseñar sistemas embebidos, optimizados o de bajo nivel con mayor precisión.

### 🧩 Componentes fundamentales

A continuación, se describen los elementos principales que conforman una computadora y permiten que el software funcione:

#### CPU (Unidad Central de Procesamiento)

-   Es el "cerebro" de la computadora.
-   Ejecuta instrucciones mediante ciclos de **fetch, decode y execute**.
-   Trabaja en conjunto con la memoria RAM para procesar datos rápidamente.

#### RAM (Memoria de Acceso Aleatorio)

-   Es memoria **volátil** y de alta velocidad.
-   Almacena temporalmente los datos y programas que están en uso.
-   Se borra cuando se apaga la máquina.

#### Almacenamiento (Discos duros y SSD)

-   Aquí se guarda la información de forma **persistente**.
-   Los **discos HDD** usan partes mecánicas; los **SSD** son electrónicos y mucho más rápidos.
-   Contienen el sistema operativo, archivos del usuario y aplicaciones.

#### Periféricos

-   Son los dispositivos externos como teclado, mouse, monitor, impresora, cámaras, altavoces, entre otros.
-   Permiten la **interacción entre el usuario y el sistema** (entrada, salida o ambas).
-   Para manejar correctamente distintos modelos y marcas, el sistema operativo utiliza **drivers**: programas que actúan como intermediarios entre el hardware y el software.
-   Los drivers permiten que el sistema operativo entienda cómo comunicarse con cada dispositivo, sin importar sus diferencias físicas o de fabricante.

### 🖥️ Chipset y System-on-a-Chip (SoC)

En los móviles y dispositivos modernos, muchos componentes se integran en un solo chip:

-   El **chipset** es un conjunto de chips en la placa base que coordina la comunicación entre la CPU, la memoria, el almacenamiento y otros periféricos.
-   El **SoC (System on a Chip)** incluye CPU, GPU, RAM, almacenamiento y más en un mismo circuito integrado.
-   Esto mejora el rendimiento y la eficiencia energética, especialmente en smartphones, tablets y dispositivos.
-   Esta integración permite dispositivos más compactos, rápidos y con menor consumo de energía.

### 🧮 Fundamentos digitales

Además del hardware físico, una computadora funciona a partir de **datos binarios**, representados mediante ceros y unos. Entender cómo se estructuran es clave para programar de forma eficiente.

#### Bits y Bytes

-   Un **bit** es la unidad mínima de información, puede valer 0 o 1.
-   Un **byte** contiene 8 bits.
-   Todo en la memoria se representa como secuencias de bits: números, letras, imágenes, instrucciones.

#### Representación de datos

Diferentes tipos de información se codifican en bits de forma específica:

-   **Enteros:** Binario puro, con o sin signo.
-   **Caracteres:** Usan codificaciones como **ASCII** o **UTF-8**.
-   **Flotantes:** Se representan mediante el estándar **IEEE 754**, que incluye signo, mantisa y exponente.
-   **Booleanos:** Representan verdadero (`1`) o falso (`0`).

#### Sistemas numéricos

-   **Binario (base 2):** utilizado internamente por todas las computadoras.
-   **Octal (base 8)** y **Hexadecimal (base 16):** usados como abreviación legible del binario.
-   **Decimal (base 10):** el que usamos los humanos.

Saber convertir entre estos sistemas es útil para:

-   Interpretar direcciones de memoria.
-   Entender configuraciones de hardware o bajo nivel.
-   Leer colores, errores o datos codificados.

---

## 🌐 Redes e Internet: Cómo funciona el mundo conectado

Internet no es solo una red de computadoras, sino una infraestructura global que permite que dispositivos en todo el mundo intercambien información.

Entender cómo funciona Internet es esencial para desarrollar software moderno, ya que la mayoría de las aplicaciones actuales dependen de servicios conectados: APIs, bases de datos remotas, almacenamiento en la nube, etc.

Esta sección explica los conceptos clave que hacen posible la comunicación en la red.

### ¿Qué es Internet?

-   Internet es una red **descentralizada** de millones de dispositivos conectados entre sí mediante cables, satélites, antenas y otros medios físicos.
-   Cada dispositivo conectado (computadora, móvil, servidor, etc.) se identifica mediante una **dirección única** llamada **IP**.
-   Internet funciona gracias a protocolos que definen cómo se deben enviar, recibir y estructurar los datos.

### Dirección IP

-   Una **IP (Internet Protocol)** es una etiqueta única que identifica a un dispositivo en una red.
-   Existen dos versiones: **IPv4** (ej: `192.168.0.1`) y **IPv6** (ej: `2001:0db8:85a3::8a2e:0370:7334`), esta última permite muchísimas más combinaciones.
-   Las direcciones IP pueden ser:
    -   **Públicas**: visibles desde Internet (como los servidores web).
    -   **Privadas**: usadas dentro de redes locales (como en tu casa o empresa).

### ¿Qué es el DNS?

-   El **DNS (Domain Name System)** es como una **agenda telefónica de Internet**.
-   Traduce nombres de dominio legibles para humanos (como `platzi.com`) a direcciones IP que las computadoras entienden (como `104.18.1.1`).
-   Sin el DNS, tendríamos que memorizar IPs para acceder a cada sitio web.

#### Ejemplo:

```plaintext
Usuario escribe en el navegador: www.platzi.com
↓
El DNS traduce eso a: 104.18.1.1
↓
El navegador se conecta a esa IP para mostrar el sitio
```

### ¿Qué es un Dominio?

-   Un **dominio** es el nombre que se asigna a una dirección IP para facilitar su uso por humanos.
-   Está compuesto por niveles jerárquicos:

    -   **TLD (Top-Level Domain)**: `.com`, `.org`, `.net`, `.edu`, etc.
    -   **Nombre del dominio**: `google`, `platzi`, `github`
    -   **Subdominios**: `www`, `blog`, `api`, etc.

Ejemplo:
`www.platzi.com` →

-   Subdominio: `www`
-   Dominio: `platzi`
-   TLD: `.com`

### Modelo Cliente-Servidor

-   Internet funciona bajo el modelo **cliente-servidor**:

    -   El **cliente** (tu navegador o app) hace peticiones.
    -   El **servidor** (por ejemplo, donde está alojado un sitio) responde con los datos.

-   Las apps modernas se apoyan en este modelo para consumir APIs, renderizar páginas, almacenar información, etc.

### ¿Qué sucede cuando visitas un sitio web?

1. Escribes un dominio en el navegador (ej: `www.platzi.com`).
2. El DNS traduce ese dominio a una IP.
3. El navegador se conecta a esa IP mediante el protocolo HTTP o HTTPS.
4. El servidor responde con HTML, CSS, JS y otros recursos.
5. El navegador interpreta y muestra el sitio.

Este proceso ocurre en milisegundos, pero involucra múltiples capas del sistema operativo, la red y los servidores remotos.

---

## 📐 Principios de calidad de software

Un software no solo debe funcionar, sino también ser **mantenible, entendible, escalable y confiable**. Estos principios ayudan a lograr esa calidad desde el diseño.

### Modularidad

-   Consiste en dividir un sistema en partes independientes (módulos), cada una con una responsabilidad clara.
-   Facilita el desarrollo en equipo, la reutilización de código y el mantenimiento.
-   Ejemplo: separar backend, frontend, base de datos y servicios externos en capas distintas.

### Abstracción

-   Es el principio de **ocultar los detalles internos** y exponer solo lo necesario.
-   Permite trabajar sobre conceptos más simples, enfocándose en _qué hace_ un módulo y no en _cómo lo hace_.
-   Favorece la reutilización, los cambios internos sin afectar a otros y la claridad del diseño.

### Cohesión

-   Mide qué tan relacionados están los elementos dentro de un mismo módulo o clase.
-   Alta cohesión significa que el módulo tiene una **responsabilidad única y bien definida**.
-   Mejora la legibilidad, las pruebas y el mantenimiento.

### Acoplamiento

-   Mide el grado de dependencia entre módulos.
-   Un **bajo acoplamiento** es deseable: los módulos deben depender lo menos posible unos de otros.
-   Esto permite modificar o reemplazar partes del sistema sin romper el resto.

---

## 🔄 Proceso de desarrollo de software (SDLC)

El **Software Development Life Cycle (SDLC)** es el conjunto de etapas que recorre un software desde que nace una idea hasta que se retira del uso.

Seguir un SDLC permite:

-   Organizar el trabajo de forma estructurada.
-   Reducir errores y retrabajo.
-   Asegurar que el software cumpla con lo que el cliente necesita.

