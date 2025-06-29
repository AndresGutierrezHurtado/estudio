# 🧱 Patrón de Arquitectura MVVM (Model-View-ViewModel)

El patrón **MVVM** (Modelo - Vista - ViewModel) es una evolución del patrón **MVC**, especialmente diseñado para aplicaciones con **interfaces de usuario complejas, reactivas o altamente interactivas**. Es ampliamente adoptado en frameworks y tecnologías modernas como **Vue, Angular, React (con hooks y estados), WPF, Jetpack Compose**, entre otros.

Este enfoque introduce un componente intermedio llamado **ViewModel**, cuya responsabilidad principal es actuar como un **puente entre la Vista y el Modelo**, permitiendo un **desacoplamiento total** entre la lógica de presentación y la lógica de negocio. Esto facilita la **reutilización de componentes**, **mejora la mantenibilidad del código** y **simplifica las pruebas unitarias y de integración**.

---

## 🎯 Objetivo del patrón MVVM

El propósito principal del patrón MVVM es **separar claramente la lógica de presentación de la lógica de negocio**, mediante el uso de **enlaces de datos automáticos (data binding)** que sincronizan automáticamente la vista con el modelo. Además, la introducción del **ViewModel** permite estructurar mejor la aplicación, favoreciendo la escalabilidad y el mantenimiento.

---

## 🧩 Estructura por capas en el patrón MVVM

### Modelo (Model)

El Modelo representa la capa de **datos y lógica de negocio**. Es totalmente independiente de la interfaz de usuario y del ViewModel. Se encarga de gestionar y estructurar los datos que la aplicación utiliza.

**Responsabilidades:**

-   Definir entidades y estructuras del dominio (como Usuario, Producto, Pedido, etc.).
-   Aplicar reglas de negocio y validaciones internas.
-   Realizar operaciones de acceso a datos (consultas, inserciones, actualizaciones, etc.).
-   Conectarse con servicios externos, APIs o bases de datos.

---

### Vista (View)

La **Vista** es la capa encargada de la **interfaz de usuario**. Define cómo se presentan los datos al usuario y cómo se capturan sus interacciones.

**Responsabilidades:**

-   Renderizar los datos expuestos por el ViewModel.
-   Declarar elementos visuales como formularios, botones, listas, tablas, etc.
-   Configurar los bindings que permiten la sincronización automática entre la UI y el ViewModel.
-   Delegar toda la lógica al ViewModel, sin contener procesamiento propio.

---

### ViewModel

El **ViewModel** es el corazón del patrón MVVM. Su rol es **conectar la Vista con el Modelo**, gestionando y adaptando los datos para que puedan ser fácilmente mostrados o utilizados por la interfaz.

**Responsabilidades:**

-   Exponer propiedades observables (estados, listas, flags) que la vista pueda vincular.
-   Procesar datos del Modelo antes de enviarlos a la Vista (formateo, cálculos, filtrado).
-   Recibir eventos desde la Vista (por ejemplo, clics o envíos de formularios) y responder a ellos adecuadamente.
-   Coordinar operaciones asincrónicas como llamadas a APIs o carga de datos.
-   Mantener el estado de la vista (por ejemplo: cargando, error, éxito).

**Importante:** El ViewModel **no debe tener una referencia directa a la Vista**.  
Esto significa que el ViewModel no debe hacer llamadas ni acceder directamente a elementos de la interfaz de usuario (por ejemplo: botones, inputs, componentes visuales).

#### Mecanismos comunes que permiten esta comunicación sin acoplamiento:

-   **En frameworks como Angular o Vue:** se usan enlaces automáticos (`v-bind`, `[(ngModel)]`) que reaccionan a cambios en el ViewModel.
-   **En React:** se usa `useState`, `useEffect` y `useContext` para mantener la UI sincronizada con los datos del ViewModel.
-   **En .NET (WPF o MAUI):** se usan propiedades que implementan `INotifyPropertyChanged`, permitiendo que la Vista se actualice cuando cambia el estado.

---

## 🔄 Flujo de Datos (Resumen Visual)

```text
[ Usuario ]
    ↓
[ Vista ]
    ↓ (Data Binding)
[ ViewModel ]
    ⇅
[ Modelo ]
```

-   Los cambios en el ViewModel se reflejan automáticamente en la vista (y viceversa).
-   El ViewModel consulta y actualiza el Modelo según sea necesario.

---

## ✅ Ventajas del patrón MVVM

-   **Separación clara de responsabilidades**, lo que facilita el mantenimiento y la colaboración en equipos.
-   **Alta testabilidad**, ya que el ViewModel puede probarse sin necesidad de cargar la interfaz de usuario.
-   Permite utilizar **herramientas de diseño visual** que trabajan directamente sobre la Vista.
-   **Reducción de código repetitivo en la Vista** gracias a los enlaces automáticos (data binding).
-   Facilita la **reutilización de lógica de presentación** a través del ViewModel.

---

## ⚠️ Desventajas o retos

-   **Dependencia de frameworks o librerías** que soporten data binding o mecanismos de reactividad.
-   Puede resultar **innecesariamente complejo** en aplicaciones pequeñas o con lógica mínima.
-   Requiere una **curva de aprendizaje inicial** mayor, especialmente para desarrolladores nuevos.
-   Si no se estructura adecuadamente, el **ViewModel puede sobrecargarse** con demasiada lógica de presentación o de estado.

---

## 🛠️ Casos de uso comunes

-   **Aplicaciones móviles** con arquitecturas reactivas, como Android usando Jetpack Compose o XML + ViewModel.
-   **Aplicaciones web** desarrolladas con frameworks que soportan binding o reactividad: Vue, Angular, React (con hooks).
-   **Aplicaciones de escritorio** que usen interfaces declarativas como WPF, UWP o MAUI en el ecosistema .NET.

---

## 🧠 Diferencias clave entre MVC y MVVM

| Aspecto        | MVC                                 | MVVM                                        |
| -------------- | ----------------------------------- | ------------------------------------------- |
| Flujo de datos | El Controlador gestiona el flujo    | El ViewModel expone datos y lógica a la Vista |
| Acoplamiento   | Vista y Controlador están acoplados | Vista y ViewModel están completamente desacoplados |
| Data Binding   | Manual                              | Automático (si lo permite el framework)     |
| Testabilidad   | Media                               | Alta                                        |
