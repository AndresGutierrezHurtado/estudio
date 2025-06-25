# Tasky - Sistema de Gestión de Tareas

## Funcionalidad de Carga de Archivos

Este sistema permite a los usuarios adjuntar archivos a sus tareas. La funcionalidad de carga de archivos está completamente integrada con la base de datos según el esquema definido en `public/SQL/prueba.sql`.

### Características de la Carga de Archivos

- **Tipos de archivo permitidos**: JPG, PNG, GIF, PDF, TXT, DOC, DOCX
- **Tamaño máximo**: 5MB por archivo
- **Múltiples archivos**: Se pueden adjuntar varios archivos a una tarea
- **Almacenamiento seguro**: Los archivos se guardan con nombres únicos para evitar conflictos
- **Base de datos**: Los registros de archivos se almacenan en la tabla `files`

### Estructura de la Base de Datos

```sql
CREATE TABLE `files` (
    `file_id` INT AUTO_INCREMENT PRIMARY KEY,
    `file_task_id` INT NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `file_created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Funcionalidades Implementadas

1. **Crear tarea con archivos**: Los usuarios pueden crear tareas y adjuntar archivos simultáneamente
2. **Visualizar archivos**: Los archivos adjuntos se muestran en la interfaz con enlaces de descarga
3. **Eliminar tareas**: Al eliminar una tarea, todos sus archivos asociados se eliminan automáticamente
4. **Validación de archivos**: Se valida el tipo y tamaño de los archivos antes de procesarlos

### Archivos Modificados

- `app/controllers/taskController.php`: Lógica de manejo de archivos
- `app/controllers/pageController.php`: Obtención de tareas con archivos
- `app/views/pages/dashboard.view.php`: Interfaz para mostrar archivos
- `public/uploads/`: Directorio para almacenar archivos subidos

### Uso

1. Accede al dashboard
2. Haz clic en "Crear Tarea"
3. Completa los campos de la tarea
4. Selecciona uno o más archivos en el campo "Archivos"
5. Haz clic en "Crear Tarea"

Los archivos se guardarán automáticamente y estarán disponibles para descarga desde la interfaz del dashboard.

### Seguridad

- Validación de tipos de archivo
- Límite de tamaño de archivo
- Nombres de archivo únicos para evitar conflictos
- Eliminación automática de archivos al eliminar tareas
- Protección contra acceso directo a archivos sensibles 