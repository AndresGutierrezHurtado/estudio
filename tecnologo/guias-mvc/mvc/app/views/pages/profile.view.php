<section class="w-full px-3 py-12">
    <div class="w-full max-w-[1200px] mx-auto flex flex-col gap-5">
        <h1 class="text-3xl font-extrabold">Perfil de <?= $user['usuario_nombre'] ?> <?= $user['usuario_apellido'] ?></h1>

        <div tabindex="0" class="collapse collapse-arrow border-base-300 bg-base-200 border">
            <input type="checkbox" class="peer" checked />
            <div class="collapse-title text-xl font-medium">Click para ver/ocultar perfil</div>
            <div class="collapse-content">
                <div class="flex items-center gap-4">
                    <div class="avatar h-fit w-fit">
                        <div class="w-12 h-12 rounded">
                            <img
                                src="<?= $user['usuario_imagen_url'] ?>"
                                alt="Foto de <?= $user['usuario_nombre'] ?>" />
                        </div>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Perfil</h2>
                        <p class="text-base-content/70">Acá hay alguna información a cerca del usuario</p>
                    </div>
                </div>
                <div class="divide-y divide-base-content border-y border-base-content mt-8 mb-4">
                    <div class="flex gap-2 py-4">
                        <div class="w-full max-w-[200px]">
                            <p class="font-medium">Nombre Completo</p>
                        </div>
                        <p class="text-base-content flex-grow"><?= $user['usuario_nombre'] . ' ' . $user['usuario_apellido'] ?></p>
                    </div>
                    <div class="flex gap-2 py-4">
                        <div class="w-full max-w-[200px]">
                            <p class="font-medium">Correo Electrónico</p>
                        </div>
                        <p class="text-base-content flex-grow"><?= $user['usuario_correo'] ?></p>
                    </div>
                    <div class="flex gap-2 py-4">
                        <div class="w-full max-w-[200px]">
                            <p class="font-medium">Numero Telefónico</p>
                        </div>
                        <p class="text-base-content flex-grow"><?= $user['usuario_telefono'] ?? 'No disponible' ?></p>
                    </div>
                    <div class="flex gap-2 py-4">
                        <div class="w-full max-w-[200px]">
                            <p class="font-medium">Dirección</p>
                        </div>
                        <p class="text-base-content flex-grow"><?= $user['usuario_direccion'] ?? 'No disponible' ?></p>
                    </div>
                    <div class="flex gap-2 py-4">
                        <div class="w-full max-w-[200px]">
                            <p class="font-medium">Rol</p>
                        </div>
                        <p class="text-base-content flex-grow"><?= $user['rol_nombre'] ?></p>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm" onclick="editUser.showModal()">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Editar el pefil
                        </button>
                        <?php if ($_SESSION['usuario']['rol_id'] == 2) : ?>
                            <a href="/page/dashboard" type="button" class="btn btn-neutral btn-sm">
                                <i class="fa-solid fa-gear"></i>
                                Panel de administrador
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if ($_SESSION['usuario_id'] == $user['usuario_id']) : ?>
                        <form action="/user/logout" method="post" class="fetch-form" data-redirect="/">
                            <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('¿Estás seguro que quieres cerrar sesión?')">
                                <i class="fa-solid fa-trash"></i>
                                Cerrar Sesión
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div tabindex="0" class="collapse collapse-arrow border-base-300 bg-base-200 border">
            <input type="checkbox" class="peer" />
            <div class="collapse-title text-xl font-medium">Click para ver/ocultar</div>
            <div class="collapse-content flex flex-col gap-4">
                <div>
                    <h2 class="text-lg font-medium">Acciones</h2>
                    <p class="text-base-content/70">Acá podras eliminar tu cuenta.</p>
                </div>
                <button type="button" class="btn btn-error btn-sm w-fit" onclick="deleteUser.showModal()">
                    <i class="fa-solid fa-trash"></i>
                    Borrar cuenta
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Edit User Modal -->
<dialog id="editUser" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>

        <h3 class="text-lg font-bold">Editar perfil</h3>
        <p class="py-4">Cambia la información del perfil</p>

        <form action="/user/update" method="post" class="flex flex-col gap-4 fetch-form">
            <input type="hidden" name="usuario_id" value="<?= $user['usuario_id'] ?>" />
            <div class="form-control">
                <label class="label">
                    <span class="label-text after:content-['*'] after:ml-0.5 after:text-red-500">Nombre</span>
                </label>
                <input placeholder="Ingresa tu nombre" name="usuario_nombre" class="input input-bordered" value="<?= $user['usuario_nombre'] ?>" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text after:content-['*'] after:ml-0.5 after:text-red-500">Apellido</span>
                </label>
                <input placeholder="Ingresa tu apellido" name="usuario_apellido" class="input input-bordered" value="<?= $user['usuario_apellido'] ?>" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text after:content-['*'] after:ml-0.5 after:text-red-500">Correo</span>
                </label>
                <input type="email" placeholder="Ingresa tu correo electrónico" name="usuario_correo" class="input input-bordered" value="<?= $user['usuario_correo'] ?>" required <?= $_SESSION['usuario']['rol_id'] == 2 ? '' : 'disabled' ?> />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Telefono</span>
                </label>
                <input type="number" placeholder="Ingresa tu telefono sin el prefijo" name="usuario_telefono" class="input input-bordered" value="<?= $user['usuario_telefono'] ?>" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Dirección</span>
                </label>
                <input placeholder="Ingresa tu direccion" name="usuario_direccion" class="input input-bordered" value="<?= $user['usuario_direccion'] ?>" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Imagen</span>
                </label>
                <label class="form-control w-full">
                    <input type="file" name="usuario_imagen" class="file-input file-input-bordered w-full" accept="jpg, png, jpeg, webp" />
                </label>
            </div>
            <?php if ($_SESSION['usuario']['rol_id'] == 2 && $_SESSION['usuario_id'] != $user['usuario_id']): ?>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Rol</span>
                    </label>
                    <select class="select select-bordered w-full" name="rol_id">
                        <?php foreach ($roles as $rol) : ?>
                            <option value="<?= $rol['rol_id'] ?>" <?= $user['rol_id'] == $rol['rol_id'] ? 'selected' : '' ?>><?= $rol['rol_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
            <div class="form-control">
                <button type="submit" class="btn btn-primary my-2 w-full py-2">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    Editar
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- Delete User Modal -->
<dialog id="deleteUser" class="modal">
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>

        <h3 class="text-lg font-bold">Borrar Cuenta</h3>
        <p class="py-4">Estás seguro que quieres eliminar tu cuenta, si es así escribe tu contraseña para confirmar.</p>

        <form action="/user/delete" method="post" data-redirect="<?= $_SESSION['usuario_id'] == $user['usuario_id'] ? '/' : '/page/dashboard' ?>" class="flex flex-col gap-4 fetch-form">
            <input type="hidden" name="usuario_id" value="<?= $user['usuario_id'] ?>">
            <input type="hidden" name="contra_referencia" value = "<?= $user['usuario_contra'] ?>">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Contraseña</span>
                </label>
                <input placeholder="*****" name="usuario_contra" class="input input-bordered" />
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-error my-2 w-full py-2">
                    <i class="fa-solid fa-trash"></i>
                    Borrar
                </button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>