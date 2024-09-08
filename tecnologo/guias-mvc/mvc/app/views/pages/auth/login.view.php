<div class="hero bg-base-200 min-h-screen"
    style="background-image: url(https://images.pexels.com/photos/2653362/pexels-photo-2653362.jpeg?cs=srgb&dl=pexels-harold-vasquez-853421-2653362.jpg&fm=jpg);">
    <div class="hero-overlay bg-black/50"></div>

    <div class="hero-content flex-col lg:flex-row-reverse">

        <div class="text-center lg:text-left text-neutral-content">
            <h1 class="text-5xl font-bold">Inicia sesión</h1>
            <p class="py-6">
                Para poder acceder ingresa tu usuario y contraseña
            </p>
            <a href="/" type="button" class="btn">
                <i class="fa-solid fa-arrow-left"></i>
                Volver
            </a>
        </div>

        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <form class="card-body fetch-form" data-redirect="/" action="/user/auth" method="post">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Correo</span>
                    </label>
                    <input type="email" name="usuario_correo" placeholder="ejemplo@gmail.com" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="usuario_contra" placeholder="*****" class="input input-bordered" required />
                </div>
                <label class="text-xs justify-start gap-2 mt-4 mb-2">
                    ¿No tienes cuenta?, <a href="/page/register" class="cursor-pointer text-primary font-bold hover:text-primary hover:text-primary hover:underline">Regístrate</a>
                </label>
                <div class="form-control">
                    <button class="btn btn-primary">Inicia sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>