# CQRS (Command Query Responsibility Segregation)

**CQRS** es un patrón arquitectónico que **separa las operaciones de lectura (Query)** y **escritura (Command)** en una aplicación. A diferencia del enfoque tradicional donde un mismo modelo atiende ambas responsabilidades, CQRS propone dividirlas en componentes distintos para mejorar **escalabilidad, rendimiento y mantenibilidad**.

Esta separación permite optimizar cada lado de forma independiente: las consultas pueden estar orientadas al rendimiento y ser más rápidas, mientras que los comandos se enfocan en mantener la integridad del dominio. CQRS se suele combinar con **Event Sourcing**, aunque no es obligatorio.

---

## 🧱 Componentes del patrón CQRS

### Command Side (Escritura)

Esta parte se encarga de manejar **comandos** que modifican el estado del sistema.

-   Contiene la **lógica de negocio**: validaciones, reglas, y flujos de cambios de estado.
-   Utiliza el **modelo de dominio completo** (por ejemplo, entidades ricas y agregados).
-   Cada comando representa una **intención del usuario**: crear pedido, cancelar reserva, modificar perfil, etc.
-   El resultado no es retornar datos, sino confirmar la ejecución o lanzar errores.

### Query Side (Lectura)

Esta parte atiende las **consultas de datos**, sin modificar el estado del sistema.

-   Utiliza modelos de lectura optimizados para obtener y mostrar datos.
-   Puede emplear bases de datos separadas, DTOs especializados o proyecciones.
-   No contiene lógica de negocio ni reglas de validación.
-   Está enfocada en el rendimiento y facilidad de acceso a los datos.

---

## 🔄 ¿Cómo fluye el código?

```plaintext
[ UI / Cliente ]
        ↓
[ Comando o Consulta ]
        ↓
[ Command Handler ]  ← Escribe
        ↓
[ Dominio / Base de datos de escritura ]
        ↓                            ↑
[ Event Dispatcher (opcional) ]      |
        ↓                            |
[ Actualiza modelo de lectura ] ← [ Query Handler ]
                                        ↓
                              [ Base de datos de lectura ]
```

> Las operaciones de **lectura y escritura están completamente desacopladas**. En algunos casos se usan **eventos** para sincronizar los cambios entre ambos modelos.

---

## ✅ Ventajas y desventajas

### Ventajas

-   **Escalabilidad horizontal**: permite separar infraestructuras de lectura y escritura.
-   **Alto rendimiento en consultas**: puedes optimizar el modelo de lectura para mostrar datos rápidamente.
-   **Mayor claridad**: cada operación tiene una única responsabilidad (leer o escribir).
-   **Flexibilidad**: permite combinar bases de datos o tecnologías diferentes por cada lado.
-   Ideal para **sistemas con muchas lecturas** o **dominios complejos**.

### Desventajas

-   **Mayor complejidad**: se deben mantener dos modelos distintos y sincronizarlos.
-   **Duplicación de lógica**: algunas validaciones deben implementarse en distintos puntos.
-   **Consistencia eventual**: no siempre los datos leídos reflejan el último comando ejecutado.
-   **Sobrecarga estructural**: no es recomendable para sistemas pequeños o CRUD simples.
