<div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="navbar bg-base-300 w-full flex justify-between items-center">

            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block h-6 w-6 stroke-current">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>

            <!-- Brand -->
            <div class="mx-2 px-2 font-extrabold text-2xl">Modelo Vista Controlador</div>

            <!-- Navigation -->
            <div class="hidden lg:block">
                <ul class="menu menu-horizontal">
                    <!-- Navbar menu content here -->
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/page/products">Productos</a></li>
                    <li><a href="/#who">Quienes somos</a></li>
                </ul>
            </div>

            <div class="flex gap-4">
                <!-- Account buttons -->
                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="/page/profile" class="flex gap-2 items-center font-semibold">
                        <div class="avatar">
                            <div class="w-10 rounded">
                                <img
                                    src="<?= $_SESSION['usuario']['usuario_imagen_url'] ?>"
                                    alt="Foto de <?= $_SESSION['usuario']['usuario_nombre'] ?>" />
                            </div>
                        </div>
                        <p><?= $_SESSION['usuario']['usuario_nombre'] ?></p>
                    </a>
                <?php else: ?>
                    <a href="/page/login" class="btn">Inicia sesión</a>
                    <a href="/page/register" class="btn">Regístrate</a>
                <?php endif; ?>

                <!-- Theme Controller -->
                <label class="flex cursor-pointer gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <input type="checkbox" value="light" class="toggle theme-controller" <?= isset($_SESSION['theme']) && $_SESSION['theme'] == 'light' ? 'checked' : '' ?> onclick="cambiarValor(this)"/>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5" />
                        <path
                            d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                    </svg>
                </label>
            </div>


        </div>
        <!-- Page content here -->
    </div>
    <div class="drawer-side">
        <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 min-h-full w-80 p-4">
            <!-- Sidebar content here -->
            <li><a href="/">Inicio</a></li>
            <li><a href="/page/products">Productos</a></li>
            <li><a href="/#who">Quienes somos</a></li>
        </ul>
    </div>
</div>