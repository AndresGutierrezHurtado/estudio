# 🧱 Patrón de Arquitectura MVVM (Model-View-ViewModel)

🔙 [Volver al módulo 5](../summary.md)

El patrón **MVVM** (Modelo - Vista - ViewModel) es una alternativa moderna al patrón **MVC**, especialmente diseñado para aplicaciones con **interfaces de usuario complejas, reactivas o altamente interactivas**. Es ampliamente adoptado en frameworks y tecnologías modernas como **Vue, Angular, React (con hooks y estados), WPF, Jetpack Compose**, entre otros.

Este enfoque introduce un componente intermedio llamado **ViewModel**, cuya responsabilidad principal es actuar como un **puente entre la Vista y el Modelo**, permitiendo un **desacoplamiento total** entre la lógica de presentación y los datos. Esto facilita la **reutilización de componentes**, **mejora la mantenibilidad del código** y **simplifica las pruebas unitarias y de integración**.

> 📌 A diferencia de MVC, MVVM permite una mayor reactividad y separación entre la interfaz y la lógica, lo que lo hace ideal para interfaces modernas basadas en componentes o flujos de estado.

---

## 🧩 Estructura por capas en el patrón MVVM

### Modelo (Model)

El Modelo es responsable de la **lógica de negocio** y de la **gestión de datos**, incluyendo su acceso y persistencia (por ejemplo, bases de datos, archivos o servicios externos). Define las entidades del sistema y las reglas del dominio, sin involucrarse en cómo se presentan o manipulan visualmente esos datos.

El Modelo debe ser independiente de cualquier lógica de presentación o interacción con el usuario. Contiene únicamente la lógica de negocio relevante para el dominio, sin preocuparse por cómo se muestra o se solicita esa información.

### Vista (View)

La Vista es la capa encargada de la **interfaz gráfica del usuario**. Su función principal es mostrar los datos al usuario y capturar sus interacciones.

No contiene lógica de negocio ni lógica de presentación. En cambio, se apoya en el ViewModel para obtener los datos y enviarle eventos como clics o formularios.

Utiliza mecanismos de data binding para sincronizarse automáticamente con el ViewModel. Esto permite que los cambios en el estado se reflejen sin necesidad de manipulación manual del DOM o del estado visual.

### ViewModel

El ViewModel es el intermediario entre la Vista y el Modelo. Su objetivo es exponer los datos de una forma que la Vista pueda mostrar fácilmente.

Aquí se encapsula la **lógica de presentación**, como el formateo de datos, la gestión de estados visuales (cargando, error, éxito), y la coordinación de flujos con el Modelo.

El ViewModel escucha eventos de la Vista y decide cómo responder. Esto puede incluir llamadas al Modelo, validaciones básicas o activación de servicios que contengan la lógica de negocio real.

Debe ser desacoplado de la Vista. Nunca accede directamente a componentes visuales, sino que trabaja a través de bindings o eventos.

---

## ✅ Ventajas y desventajas

### Ventajas

-   **Separación clara de responsabilidades**, lo que facilita el mantenimiento y la colaboración en equipos.
-   **Alta testabilidad**, ya que el ViewModel puede probarse sin necesidad de cargar la interfaz de usuario.
-   Permite utilizar **herramientas de diseño visual** que trabajan directamente sobre la Vista.
-   **Reducción de código repetitivo en la Vista** gracias a los enlaces automáticos (data binding).
-   Facilita la **reutilización de lógica de presentación** a través del ViewModel.

### Desventajas

-   **Dependencia de frameworks o librerías** que soporten data binding o mecanismos de reactividad.
-   Puede resultar **innecesariamente complejo** en aplicaciones pequeñas o con lógica mínima.
-   Requiere una **curva de aprendizaje inicial** mayor, especialmente para desarrolladores nuevos.
-   Si no se estructura adecuadamente, el **ViewModel puede sobrecargarse** con demasiada lógica de presentación o de estado.

---

## 🔄 Flujo de Datos

-   La Vista se enlaza con el ViewModel mediante data binding, reflejando automáticamente los cambios de estado.
-   El ViewModel maneja los eventos de la Vista y se comunica con el Modelo para obtener o actualizar datos.
-   El Modelo gestiona la lógica de negocio y la persistencia, devolviendo los resultados al ViewModel.

```text
[ Usuario ]
    ↓
[ Vista ]
    ↓ (Data Binding)
[ ViewModel ]
    ⇅
[ Modelo ]
```
