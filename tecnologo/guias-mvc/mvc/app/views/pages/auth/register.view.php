<div class="hero bg-base-200 min-h-screen"
    style="background-image: url(https://images.pexels.com/photos/2653362/pexels-photo-2653362.jpeg?cs=srgb&dl=pexels-harold-vasquez-853421-2653362.jpg&fm=jpg);">
    <div class="hero-overlay bg-black/50"></div>

    <div class="hero-content flex-col lg:flex-row">

        <div class="text-center lg:text-right text-neutral-content">
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
            <form class="card-body fetch-form" method="post" action="/user/create" data-redirect="/page/login">
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
                    <label class="form-control w-full">
                        <input type="file" name="usuario_imagen" class="file-input file-input-bordered w-full" accept="jpg, png, jpeg, webp" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Contraseña</span>
                    </label>
                    <input type="password" name="usuario_contra" placeholder="*****" class="input input-bordered" required />
                </div>
                <label class="text-xs justify-start gap-2 mt-4 mb-2">
                    ¿Ya tienes una cuenta?, <a href="/page/login" class="cursor-pointer text-primary font-bold hover:text-primary hover:text-primary hover:underline">Inicia sesión</a>
                </label>
                <div class="form-control">
                    <button class="btn btn-primary">Regístrate</button>
                </div>
            </form>
        </div>
    </div>
</div>