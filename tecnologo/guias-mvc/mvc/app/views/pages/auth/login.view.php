<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">

        <div class="text-center lg:text-left">
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
                    <label class="label">
                        <a href="/page/register" class="label-text-alt link link-hover">¿No tienes cuenta?, Regístrate</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>