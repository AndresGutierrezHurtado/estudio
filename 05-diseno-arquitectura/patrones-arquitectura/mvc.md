# Patrón de Arquitectura MVC (Model-View-Controller)

🔙 [Volver al módulo 5](../summary.md)

Cuando empezamos a construir aplicaciones, es común que todo el código esté mezclado: la parte que muestra la interfaz, la que maneja los datos y la que responde a las acciones del usuario. Esto puede funcionar al principio, pero a medida que la aplicación crece, se vuelve difícil de entender, mantener o escalar. Aquí es donde entra en juego el patrón **MVC (Modelo-Vista-Controlador)**.

El patrón **MVC (Modelo-Vista-Controlador)** propone dividir una aplicación en tres partes bien definidas: la lógica de negocio (modelo), la interfaz de usuario (vista) y el control del flujo de datos (controlador). Esta separación permite que el código sea más **ordenado, mantenible y escalable**, además de facilitar el trabajo en equipo.

### ¿Por qué aprender MVC?

El patrón MVC es una de las formas más sencillas y efectivas para comenzar a entender **cómo estructurar una aplicación de forma profesional**. Es ideal para quienes están dando sus primeros pasos en arquitectura de software porque:

-   Es **fácil de entender** y aplicar.
-   Está presente en muchos frameworks modernos (Laravel, Spring, Django, Ruby on Rails, etc.).
-   Sirve como **base para comprender arquitecturas más complejas**, como MVVM, MVP, Hexagonal, Clean Architecture o DDD.
-   Te entrena para **pensar en capas y responsabilidades**, algo clave para crecer como desarrollador/a profesional.

---

## 🧱 Capas del MVC

### Modelo (Model)

Es la capa encargada de manejar el **acceso y la persistencia de los datos**. Se conecta con la base de datos (u otras fuentes) para leer, guardar, actualizar o eliminar información. Representa las entidades del sistema, como usuarios, productos o pedidos.

No contiene lógica de negocio ni se preocupa por cómo se muestran los datos. Su única responsabilidad es **proveer y estructurar la información que necesita el controlador**.

### Vista (View)

Es la capa encargada de la **interfaz de usuario**, es decir, de mostrar la información en pantalla. Toma los datos que le envía el controlador y los presenta al usuario de forma visual, ya sea con HTML, componentes de interfaz o cualquier tipo de presentación gráfica.

No contiene lógica de negocio ni accede directamente a los datos. Su rol es **mostrar la información y recibir las acciones del usuario** (como clics o formularios).

### Controlador (Controller)

Es la capa encargada de **coordinar el flujo entre la vista y el modelo**. Recibe las acciones del usuario (por ejemplo, al enviar un formulario), procesa esa información, hace las validaciones necesarias, consulta o modifica los datos a través del modelo y finalmente decide qué vista mostrar como respuesta.

Aquí se concentra la **lógica de negocio**, ya que es el responsable de decidir qué se hace con la información, cómo se procesa y cuándo se actualiza la interfaz.

---

## ✅ Ventajas y Desventajas

### Ventajas

-   **Separación de responsabilidades**: cada capa tiene un propósito claro (modelo, vista y controlador), lo que facilita el desarrollo y la comprensión del sistema.
-   **Código más organizado y mantenible**: los cambios en una capa afectan mínimamente a las otras, reduciendo errores y mejorando la escalabilidad.
-   **Facilita las pruebas**: al estar separadas las capas, se pueden testear de forma independiente (por ejemplo, pruebas unitarias al modelo).
-   **Amplio soporte en frameworks modernos**: muchos frameworks populares como Laravel, Spring, Django, ASP.NET MVC o Ruby on Rails adoptan MVC como convención por defecto.
-   **Base para arquitecturas más avanzadas**: aprender MVC facilita la transición hacia patrones más sofisticados como MVVM, Clean Architecture o DDD.
-   **Fácil de aprender y aplicar**: es uno de los patrones arquitectónicos más accesibles, ideal para quienes inician en el desarrollo profesional.

### Desventajas

-   **Código extenso en proyectos grandes**: aunque ayuda a organizar mejor, la estructura puede crecer mucho y volverse difícil de navegar si no se gestiona adecuadamente.
-   **Puede parecer innecesario en proyectos pequeños**: en aplicaciones muy simples, aplicar MVC podría añadir complejidad sin aportar grandes beneficios.

---

## 🔄 Flujo de Datos

```text
[ Usuario ] (hace clic)
    ↓
[ Vista ] (pantalla)
    ↓ envía acción
[ Controlador ] (procesa)
    ↓ llama al modelo
[ Modelo ] (guarda / obtiene datos)
    ↓ devuelve respuesta
[ Controlador ]
    ↓
[ Vista (se actualiza) ]
```
