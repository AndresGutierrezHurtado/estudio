<div class="drawer-open flex flex-row-reverse">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <main class="drawer-content flex flex-col w-full h-screen">
        <header class="bg-neutral text-neutral-content px-4 py-7 w-full text-center">
            <h1 class="text-4xl font-extrabold tracking-tight">Panel de administrador</h1>
            <p class="text-xl text-neutral-content/70">Usuarios</p>
        </header>
        <div class="h-full overflow-y-scroll">
            <div class="w-full max-w-[800px] mx-auto py-5">
                <span class="w-full flex justify-between items-center p-4 bg-neutral text-neutral-content rounded-t">
                    <h2 class="text-xl font-bold">Tabla de usuarios</h2>
                    <div class="flex items-center gap-2">
                        <span>
                            <div class="dropdown dropdown-hover">
                                <div tabindex="0" role="button" class="btn btn-neutral m-1">Ordenar por</div>
                                <ul tabindex="0" class="dropdown-content menu bg-base-100 text-base-content rounded-box z-[1] w-52 p-2 shadow">
                                    <li><a href="/page/dashboard/?sort=usuario_id">ID</a></li>
                                    <li><a href="/page/dashboard/?sort=usuario_nombre">Nombre</a></li>
                                    <li><a href="/page/dashboard/?sort=usuario_correo">Correo</a></li>
                                    <li><a href="/page/dashboard/?sort=roles.rol_nombre">Rol</a></li>
                                </ul>
                            </div>
                        </span>
                        <form action="/page/dashboard/" method="get">
                            <label class="input input-sm input-bordered text-neutral flex items-center gap-2">
                                <input type="text" class="grow" placeholder="Búsqueda" name="search" value="<?= $_GET['search'] ?? '' ?>" />
                                <svg
                                    onclick="this.parentNode.parentNode.submit()"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    class="h-4 w-4 opacity-70 cursor-pointer">
                                    <path
                                        fill-rule="evenodd"
                                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </form>
                    </div>
                </span>

                <Table class="w-full border border-base-300">
                    <thead class="bg-base-200 text-left [&>tr>th]:p-2">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-base-300 border-y border-base-300 [&>tr>td]:p-2">
                        <?php foreach ($users['data'] as $user): ?>
                            <tr>
                                <td><?= $user['usuario_id'] ?></td>
                                <td><?= $user['usuario_nombre'] ?></td>
                                <td><?= $user['usuario_correo'] ?></td>
                                <td><?= $user['rol_nombre'] ?></td>
                                <td>
                                    <a href="/page/profile/?usuario=<?= $user['usuario_id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </Table>
                <div class="w-full flex justify-between items-center p-4 bg-neutral text-neutral-content rounded-b">
                    <h2>Viendo <?= $users['page'] . '-' . $users['page'] * $users['limit']  ?> de <?= $users['rows'] ?></h2>
                    <div class="flex gap-2">
                        <?php for ($i = 1; $i <= $users['pages']; $i++): ?>
                            <a href="/page/dashboard/?page=<?= $i ?><?= isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : '' ?>" class="btn btn-neutral btn-sm">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer bg-neutral text-neutral-content border-base-300 border-t px-10 py-4">
            <aside class="grid-flow-col items-center">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    class="fill-current">
                    <path
                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
                </svg>
                <p>
                    Modelo Vista Controlador
                    <br />
                    Explicando el mvc de la mejor manera, 2024.
                </p>
            </aside>
            <nav class="md:place-self-center md:justify-self-end">
                <div class="grid grid-flow-col gap-4">
                    <a class="link link-hover tooltip tooltip-left" data-tip="GitHub" href="https://github.com/AndresGutierrezHurtado/estudio/tree/main/tecnologo/guias-mvc/mvc" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            class="fill-current">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                </div>
            </nav>
        </footer>
    </main>
    <div class="drawer-side flex-none">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 flex flex-col justify-between">
            <!-- Sidebar content here -->
            <a href="/" class="tooltip tooltip-bottom" data-tip="Inicio">
                <h1 class="text-3xl font-extrabold tracking-tight text-center">
                    MVC
                </h1>
            </a>
            <div class="space-y-2">
                <li>
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        Inicio
                    </a>
                </li>
                <li class="border-l-2 border-primary bg-neutral-content text-neutral hover:bg-neutral hover:text-neutral-content duration-300 rounded-r-lg">
                    <a href="/page/dashboard">
                        <i class="fa-solid fa-user-gear"></i>
                        Panel de administrador
                    </a>
                </li>
            </div>
            <a href="/page/profile" class="flex items-center gap-4 p-3 rounded-lg hover:bg-base-300 duration-300">
                <div class="avatar h-fit w-fit">
                    <div class="w-12 h-12 rounded">
                        <img
                            src="<?= $_SESSION['usuario']['usuario_imagen_url'] ?>"
                            alt="Foto de <?= $_SESSION['usuario']['usuario_nombre'] ?>" />
                    </div>
                </div>
                <div>
                    <h2 class="text-lg font-medium">Ir al perfil</h2>
                    <p class="text-base-content/70"><?= $_SESSION['usuario']['usuario_nombre'] . ' ' . $_SESSION['usuario']['usuario_apellido'] ?></p>
                </div>
            </a>

        </ul>
    </div>
</div>