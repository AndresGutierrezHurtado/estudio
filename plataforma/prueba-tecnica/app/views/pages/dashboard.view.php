<main class="w-full min-h-screen bg-gray-50">
    <header class="bg-white shadow-sm border-b">
        <div class="w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-900">Tasky Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Bienvenido, <?= $_SESSION['user']['user_nickname'] ?></span>
                    <a href="/auth/logout" class="btn btn-outline btn-sm">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Results Summary -->
    <?php if (!empty($_GET['search']) || !empty($_GET['priority']) || !empty($_GET['status']) || !empty($_GET['date_from']) || !empty($_GET['date_to'])): ?>
        <div class="w-full max-w-[1200px] mx-auto my-5 bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-blue-800 font-medium">
                        <?= count($tasks) ?> tarea<?= count($tasks) !== 1 ? 's' : '' ?> encontrada<?= count($tasks) !== 1 ? 's' : '' ?>
                    </span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section class="w-full max-w-[1200px] mx-auto py-10 flex gap-15">
        <!-- Filters Section -->
        <div class="w-full md:max-w-[400px] bg-white rounded-lg shadow h-fit">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Filtros y Ordenamiento</h2>
            </div>
            <div class="p-6">
                <form method="GET" action="/page/dashboard/" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Search -->
                        <div class="col-span-3">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                            <input
                                type="text"
                                id="search"
                                name="search"
                                value="<?= $_GET['search'] ?? '' ?>"
                                placeholder="Buscar en título o descripción..."
                                class="input input-bordered w-full focus:outline-0 focus:border-primary" />
                        </div>

                        <!-- Priority Filter -->
                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Prioridad</label>
                            <select id="priority" name="priority" class="select select-bordered w-full focus:outline-0 focus:border-primary">
                                <option value="">Todas las prioridades</option>
                                <option value="alta" <?= ($_GET['priority'] ?? '') === 'alta' ? 'selected' : '' ?>>Alta</option>
                                <option value="media" <?= ($_GET['priority'] ?? '') === 'media' ? 'selected' : '' ?>>Media</option>
                                <option value="baja" <?= ($_GET['priority'] ?? '') === 'baja' ? 'selected' : '' ?>>Baja</option>
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                            <select id="status" name="status" class="select select-bordered w-full focus:outline-0 focus:border-primary">
                                <option value="">Todos los estados</option>
                                <option value="pending" <?= ($_GET['status'] ?? '') === 'pending' ? 'selected' : '' ?>>Pendiente</option>
                                <option value="completed" <?= ($_GET['status'] ?? '') === 'completed' ? 'selected' : '' ?>>Completada</option>
                                <option value="overdue" <?= ($_GET['status'] ?? '') === 'overdue' ? 'selected' : '' ?>>Vencida</option>
                            </select>
                        </div>

                        <!-- Sort Field -->
                        <div>
                            <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Ordenar por</label>
                            <select id="sort" name="sort" class="select select-bordered w-full focus:outline-0 focus:border-primary">
                                <option value="task_created_at:DESC" <?= ($_GET['sort'] ?? 'task_created_at:DESC') === 'task_created_at:DESC' ? 'selected' : '' ?>>Fecha de creación: más reciente</option>
                                <option value="task_created_at:ASC" <?= ($_GET['sort'] ?? 'task_created_at:ASC') === 'task_created_at:ASC' ? 'selected' : '' ?>>Fecha de creación: más antigua</option>
                                <option value="task_due_date:DESC" <?= ($_GET['sort'] ?? 'task_due_date:DESC') === 'task_due_date:DESC' ? 'selected' : '' ?>>Fecha de vencimiento: más reciente</option>
                                <option value="task_due_date:ASC" <?= ($_GET['sort'] ?? 'task_due_date:ASC') === 'task_due_date:ASC' ? 'selected' : '' ?>>Fecha de vencimiento: más antigua</option>
                                <option value="task_title:DESC" <?= ($_GET['sort'] ?? 'task_title:DESC') === 'task_title:DESC' ? 'selected' : '' ?>>Título: Z a A</option>
                                <option value="task_title:ASC" <?= ($_GET['sort'] ?? 'task_title:ASC') === 'task_title:ASC' ? 'selected' : '' ?>>Título: A a Z</option>
                                <option value="task_priority:DESC" <?= ($_GET['sort'] ?? 'task_priority:DESC') === 'task_priority:DESC' ? 'selected' : '' ?>>Prioridad: más alta</option>
                                <option value="task_priority:ASC" <?= ($_GET['sort'] ?? 'task_priority:ASC') === 'task_priority:ASC' ? 'selected' : '' ?>>Prioridad: más baja</option>
                            </select>
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Fecha desde</label>
                            <input
                                type="date"
                                id="date_from"
                                name="date_from"
                                value="<?= $_GET['date_from'] ?? '' ?>"
                                class="input input-bordered w-full focus:outline-0 focus:border-primary" />
                        </div>

                        <div>
                            <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Fecha hasta</label>
                            <input
                                type="date"
                                id="date_to"
                                name="date_to"
                                value="<?= $_GET['date_to'] ?? '' ?>"
                                class="input input-bordered w-full focus:outline-0 focus:border-primary" />
                        </div>
                    </div>

                    <div class="flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Aplicar Filtros
                        </button>
                        <?php if (!empty($_GET['search']) || !empty($_GET['priority']) || !empty($_GET['status']) || !empty($_GET['date_from']) || !empty($_GET['date_to'])): ?>
                            <a href="/page/dashboard" class="btn btn-outline btn-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Limpiar
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tasks Section -->
        <div class="w-full bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-900">Mis Tareas</h2>
                <button class="btn btn-primary btn-sm" onclick="document.getElementById('create-task-modal').show()">
                    Crear Tarea
                </button>
            </div>
            <div class="p-6">
                <?php if (empty($tasks)): ?>
                    <div class="text-center text-gray-500">
                        <p>No hay tareas creadas aún.</p>
                        <button class="btn btn-outline btn-sm mt-2" onclick="document.getElementById('create-task-modal').show()">
                            Crear Tarea
                        </button>
                    </div>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php foreach ($tasks as $task): ?>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900"><?= $task['task_title'] ?></h3>
                                        <?php if ($task['task_description']): ?>
                                            <p class="text-gray-600 mt-1"><?= $task['task_description'] ?></p>
                                        <?php endif; ?>

                                        <div class="flex items-center gap-4 mt-3 text-sm text-gray-500">
                                            <?php if ($task['task_due_date']): ?>
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <?= date('d-m-Y', strtotime($task['task_due_date'])) ?>
                                                </span>
                                            <?php endif; ?>

                                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                                    <?php
                                                    switch ($task['task_priority']) {
                                                        case 'alta':
                                                            echo 'bg-red-100 text-red-800';
                                                            break;
                                                        case 'media':
                                                            echo 'bg-yellow-100 text-yellow-800';
                                                            break;
                                                        case 'baja':
                                                            echo 'bg-green-100 text-green-800';
                                                            break;
                                                    }
                                                    ?>">
                                                <?= ucfirst($task['task_priority']) ?>
                                            </span>

                                            <span class="px-2 py-1 rounded-full text-xs font-medium <?= $task['task_completed'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                                <?php if ($task['task_completed']): ?>
                                                    Completada
                                                <?php else: ?>
                                                    <?php if (strtotime($task['task_due_date']) > strtotime('today')): ?>
                                                        Pendiente
                                                    <?php else: ?>
                                                        Vencida
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </span>
                                        </div>

                                        <?php if ($task['files']): ?>
                                            <div class="mt-3">
                                                <h4 class="text-sm font-medium text-gray-700 mb-2">Archivos adjuntos:</h4>
                                                <div class="flex flex-wrap gap-2">
                                                    <?php
                                                    $files = explode(',', $task['files']);
                                                    foreach ($files as $file):
                                                        $fileName = basename($file);
                                                    ?>
                                                        <a href="/<?= $file ?>" target="_blank" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded hover:bg-blue-200">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                                            </svg>
                                                            <?= $fileName ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="flex items-center gap-2 ml-4">
                                        <button class="btn btn-ghost btn-sm" onclick="document.getElementById('edit-task-modal-<?= $task['task_id'] ?>').show()">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button class="btn btn-ghost btn-sm text-red-600" onclick="deleteTask(<?= $task['task_id'] ?>)">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <dialog id="create-task-modal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold mb-4">Crear Nueva Tarea</h3>
            <p class="text-gray-600 mb-6">Completa los datos para crear una nueva tarea en tu dashboard.</p>

            <form action="/task/create" method="POST" enctype="multipart/form-data" class="space-y-5">
                <fieldset class="fieldset">
                    <label for="task_title" class="fieldset-label">Título de la tarea:</label>
                    <label class="input w-full focus-within:outline-0 focus-within:border-primary validator">
                        <input
                            type="text"
                            id="task_title"
                            name="task_title"
                            placeholder="Ingresa el título de la tarea"
                            maxlength="100"
                            required />
                    </label>
                    <div class="validator-hint hidden">El título es obligatorio</div>
                </fieldset>

                <fieldset class="fieldset">
                    <label for="task_description" class="fieldset-label">Descripción:</label>
                    <textarea
                        id="task_description"
                        name="task_description"
                        class="textarea textarea-bordered focus:outline-0 focus:border-primary w-full"
                        rows="3"
                        placeholder="Describe los detalles de la tarea..."></textarea>
                </fieldset>

                <fieldset class="fieldset">
                    <label for="task_due_date" class="fieldset-label">Fecha de vencimiento:</label>
                    <input
                        type="text"
                        name="task_due_date"
                        class="w-full input focus:outline-0 focus:border-primary"
                        id="task_due_date"
                        value="Selecciona una fecha"
                        readonly />
                </fieldset>

                <fieldset class="fieldset">
                    <label for="task_priority" class="fieldset-label">Prioridad:</label>
                    <select
                        id="task_priority"
                        name="task_priority"
                        class="select select-bordered focus:outline-0 focus:border-primary w-full">
                        <option value="baja" class="text-green-500 hover:text-green-500">Baja</option>
                        <option value="media" selected class="text-yellow-500 hover:text-yellow-500">Media</option>
                        <option value="alta" class="text-red-500 hover:text-red-500">Alta</option>
                    </select>
                </fieldset>

                <fieldset class="fieldset">
                    <label for="task_files" class="fieldset-label">Archivos:</label>
                    <input type="file" id="task_files" multiple name="files[]" class="file-input file-input-bordered w-full" />
                    <p class="text-xs text-gray-500 mt-1">Tipos permitidos: JPG, PNG, GIF, PDF, TXT, DOC, DOCX. Máximo 5MB por archivo.</p>
                </fieldset>

                <fieldset class="pt-3 flex gap-2">
                    <button type="button" class="btn btn-ghost" onclick="document.getElementById('create-task-modal').close()">Cancelar</button>
                    <button type="submit" class="btn btn-primary shadow-none">Crear Tarea</button>
                </fieldset>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <?php foreach ($tasks as $task): ?>
        <dialog id="edit-task-modal-<?= $task['task_id'] ?>" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold mb-4">Editar Tarea</h3>
                <p class="text-gray-600 mb-6">Completa los datos para editar la tarea.</p>

                <form action="/task/update" method="POST" enctype="multipart/form-data" class="space-y-5">
                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>" />
                    <fieldset class="fieldset">
                        <label for="task_title" class="fieldset-label">Título de la tarea:</label>
                        <input
                            type="text"
                            id="task_title"
                            name="task_title"
                            placeholder="Ingresa el título de la tarea"
                            maxlength="100"
                            class="input input-bordered w-full focus:outline-0 focus:border-primary"
                            value="<?= $task['task_title'] ?>"
                            required />
                        <div class="validator-hint hidden">El título es obligatorio</div>
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="task_description" class="fieldset-label">Descripción:</label>
                        <textarea
                            id="task_description"
                            name="task_description"
                            class="textarea textarea-bordered focus:outline-0 focus:border-primary w-full"
                            rows="3"
                            placeholder="Describe los detalles de la tarea..."><?= $task['task_description'] ?></textarea>
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="task_due_date" class="fieldset-label">Fecha de vencimiento:</label>
                        <input
                            type="text"
                            name="task_due_date"
                            id="edit_task_due_date"
                            class="w-full input focus:outline-0 focus:border-primary"
                            value="<?= $task['task_due_date'] ?>" />
                    </fieldset>
                    <fieldset class="fieldset">
                        <label for="task_priority" class="fieldset-label">Prioridad:</label>
                        <?= $task['task_priority'] === "media" ?>
                        <select
                            id="task_priority"
                            name="task_priority"
                            class="select select-bordered focus:outline-0 focus:border-primary w-full">
                            <option value="baja" <?= $task['task_priority'] === "baja" ? "selected" : "" ?>  class="text-green-500 hover:text-green-500">Baja</option>
                            <option value="media" <?= $task['task_priority'] === "media" ? "selected" : "" ?> class="text-yellow-500 hover:text-yellow-500">Media</option>
                            <option value="alta" <?= $task['task_priority'] === "alta" ? "selected" : "" ?> class="text-red-500 hover:text-red-500">Alta</option>
                        </select>
                    </fieldset>
                    <fieldset class="pt-3 flex gap-2">
                        <button type="button" class="btn btn-ghost" onclick="document.getElementById('edit-task-modal-<?= $task['task_id'] ?>').close()">Cancelar</button>
                        <button type="submit" class="btn btn-primary shadow-none">Editar Tarea</button>
                    </fieldset>
                </form>
            </div>
        </dialog>
    <?php endforeach; ?>
</main>

<script>
    const taskDueDate = new Pikaday({
        field: document.getElementById('task_due_date'),
        format: 'D/M/YYYY',
        toString(date, format) {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        },
        parse(dateString, format) {
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
    });
    const taskDueDate2 = new Pikaday({
        field: document.getElementById('edit_task_due_date'),
        format: 'D/M/YYYY',
        toString(date, format) {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        },
        parse(dateString, format) {
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
    });

    function deleteTask(taskId) {
        SweetAlertUtils.confirm(
            '¿Estás seguro?',
            'Esta acción eliminará la tarea y todos sus archivos adjuntos. No se puede deshacer.',
            'Sí, eliminar',
            'Cancelar'
        ).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/task/delete';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'task_id';
                input.value = taskId;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>