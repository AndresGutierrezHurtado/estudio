<main class="w-full h-screen p-10 flex flex-row-reverse gap-32">
    <aside class="w-full max-w-[500px] flex flex-col gap-20">
        <header class="w-full flex flex-col items-end gap-5">
            <h2 class="text-2xl font-bold">Tasky</h2>
        </header>
        <div class="space-y-6">
            <div class="space-y-2">
                <h1 class="text-4xl font-extrabold">Crea tu cuenta</h1>
                <p class="text-lg">
                    Ingresa tus datos para crear tu cuenta y ser parte de la comunidad de Tasky, donde podrás organizar tus tareas y proyectos.
                </p>
            </div>
            <form action="/auth/register" method="POST" class="space-y-5">
                <!-- usename -->
                <fieldset class="fieldset">
                    <label for="nickname" class="fieldset-label">Nombre de usuario:</label>
                    <label class="input w-full focus-within:outline-0 focus-within:border-primary validator">
                        <input type="text" id="nickname" name="nickname" placeholder="Nombre de usuario" minlength="3" required />
                        <div class="validator-hint hidden">El nombre de usuario debe tener al menos 3 caracteres</div>
                    </label>
                </fieldset>
                <!-- email -->
                <fieldset class="fieldset">
                    <label for="email" class="fieldset-label">Correo electrónico:</label>
                    <label class="input w-full focus-within:outline-0 focus-within:border-primary validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2.5"
                                fill="none"
                                stroke="currentColor">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="ejemplo@gmail.com"
                            required />
                    </label>
                    <div class="validator-hint hidden">Ingresa un correo electrónico válido</div>
                </fieldset>
                <!-- password -->
                <fieldset class="fieldset">
                    <label for="password" class="fieldset-label">Contraseña:</label>
                    <label class="input w-full focus-within:outline-0 focus-within:border-primary validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2.5"
                                fill="none"
                                stroke="currentColor">
                                <path
                                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path>
                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </g>
                        </svg>
                        <input
                            required
                            type="password"
                            id="password"
                            name="password"
                            placeholder="********"
                            minlength="8"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Debe tener más de 8 caracteres, incluyendo número, letra minúscula y letra mayúscula" />
                    </label>
                    <p class="validator-hint hidden">
                        Debe tener más de 8 caracteres, incluyendo
                        <br />un número <br />una letra minúscula <br />una letra mayúscula
                    </p>
                </fieldset>
                <fieldset class="pt-3 space-y-5">
                    <button type="submit" class="btn btn-primary shadow-none w-full">Iniciar sesión</button>
                    <p class="text-base-content/80 text-lg">¿Ya tienes una cuenta? <a href="/page/home " class="text-primary hover:underline">Inicia Sesión</a></p>
                </fieldset>
            </form>
        </div>
    </aside>
    <main class="w-full h-full rounded-xl shadow-lg overflow-hidden">
        <img
            src="https://img.freepik.com/vector-gratis/concepto-storyboard-diseno-plano-resaltadores_23-2148705992.jpg?semt=ais_hybrid&w=740"
            alt="Imagen de fondo"
            class="w-full h-full object-cover">
    </main>
</main>