# Event Sourcing

🔙 [Volver al módulo 5](../summary.md)

**Event Sourcing** es un patrón arquitectónico donde el estado de una aplicación **no se guarda directamente**, sino que se reconstruye a partir de una **secuencia de eventos** que representan los cambios ocurridos en el sistema. Cada vez que algo cambia, se registra un evento inmutable que describe **qué ocurrió** en lugar de guardar solo el nuevo estado.

Este enfoque permite una trazabilidad completa del comportamiento del sistema a lo largo del tiempo, lo que resulta útil para auditoría, depuración avanzada y funcionalidades como **replay** o **undo**.

---

## 🧱 Componentes principales

### Eventos (Events)

Son objetos inmutables que representan una acción ocurrida en el sistema. Por ejemplo: `PedidoCreado`, `ProductoAgregado`, `PagoConfirmado`.

-   Deben contener toda la información necesaria para describir el cambio.
-   Se almacenan en orden cronológico en un **Event Store**.
-   Una vez emitidos, **no se modifican ni eliminan**.

### Aggregates

Componentes que representan una unidad de consistencia del dominio (por ejemplo, un pedido o una cuenta).

-   Aplican eventos para modificar su estado interno.
-   Generan nuevos eventos como resultado de comandos válidos.
-   No almacenan directamente su estado, sino que lo reconstruyen **reproduciendo los eventos**.

### Event Store (Almacenamiento de eventos)

Es el lugar donde se guardan los eventos de forma persistente.

-   Permite almacenar eventos en orden de aparición.
-   Debe garantizar integridad y secuencia correcta.
-   Puede ser una base de datos especializada o un sistema de colas.

### Proyecciones (Read Models)

Modelos de solo lectura generados a partir de los eventos.

-   Sirven para optimizar las consultas (similar al Query Model de CQRS).
-   Se actualizan en tiempo real o por lotes, a medida que se emiten nuevos eventos.
-   Pueden estructurarse según las necesidades de la interfaz o del usuario final.

---

## 🔄 ¿Cómo fluye el código?

El estado no se guarda directamente. En su lugar, el sistema "reproduce" todos los eventos desde cero para obtener el estado actual.

```plaintext
[ Comando ]
    ↓
[ Valida en el Aggregate ]
    ↓
[ Genera Evento ]
    ↓
[ Guarda Evento en Event Store ]
    ↓
[ Reproduce evento para actualizar Aggregate ]
    ↓
[ Publica evento → Proyección / Integraciones externas ]
```

---

## ✅ Ventajas y desventajas

### Ventajas

-   **Trazabilidad total**: puedes ver exactamente qué ocurrió, cuándo y por qué.
-   **Auditoría y debugging avanzados**: ideal para sistemas donde cada acción importa.
-   **Replay / Undo**: puedes volver atrás o reconstruir versiones anteriores del estado.
-   **Compatibilidad con CQRS**: ambos patrones se complementan muy bien.

### Desventajas

-   **Mayor complejidad**: modelar eventos correctamente puede ser desafiante.
-   **Consistencia eventual**: el estado actual se deriva de múltiples eventos.
-   **Costos de rendimiento**: reconstruir el estado completo puede ser lento si no se usan snapshots.
-   **Dificultad en migraciones**: cambiar la estructura de eventos existentes es delicado.
