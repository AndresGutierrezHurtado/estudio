<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row">

        <div class="text-center lg:text-right">
            <h1 class="text-5xl font-bold">Regístrate</h1>
            <p class="py-6">
                Para poder hacer parte de nuestra comunidad crea tu cuenta.
            </p>
            <a href="/" type="button" class="btn">
                <i class="fa-solid fa-arrow-left"></i>
                Volver
            </a>
        </div>

        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <form class="card-body fetch-form" method="post" action="/user/create">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nombre</span>
                    </label>
                    <input name="usuario_nombre" placeholder="Ingresa tu nombre" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Apellido</span>
                    </label>
                    <input name="usuario_apellido" placeholder="Ingresa tu apellido" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Correo</span>
                    </label>
                    <input type="email" name="usuario_correo" placeholder="ejemplo@gmail.com" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Imagen</span>
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <input type="file" name="imagen" class="file-input file-input-bordered w-full max-w-xs" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="usuario_contra" placeholder="*****" class="input input-bordered" required />
                    <label class="label">
                        <a href="/page/login" class="label-text-alt link link-hover">¿Ya tienes una cuenta?, Inicia sesión</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>