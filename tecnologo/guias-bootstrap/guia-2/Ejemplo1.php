<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-success d-flex align-items-center gap-2" href="#">
                <img src="https://senacertificados.co/wp-content/uploads/2021/10/Logo-de-SENA-png-verde-300x300-1.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                <span>SENA</span>
            </a>

            <!-- Boton Responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto fs-5">
                  <a class="nav-link" href="#">Inicio</a>
                  <a class="nav-link active" href="#">Productos</a>
                  <a class="nav-link" href="#">Sobre nosotros</a>
                  <a class="nav-link" aria-disabled="true">Contáctanos</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
        <section>
            <div class="container m-auto d-flex flex-column align-items-center gap-2 py-5">
                <h1>Productos</h1>

                <div class="alert alert-success d-none w-100 text-center fw-bold text-success" role="alert" id="alerta">
                    Agregado al carrito correctamente
                </div>
                <div class="d-grid gap-4 w-100" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">

                    <?php for ($i = 1; $i <= 12; $i++): ?>

                    <div class="card" style="width: 18rem;">
                        <img src="https://senaeduco.com.co/wp-content/uploads/2022/03/Cursos-Virtuales-gratis.png" class="card-img-top pt-4 px-4" style="max-height: 250px;" alt="Imagen curso">
                        <div class="card-body">
                            <h5 class="card-title">Producto</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-secondary boton-carrito">Carrito</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $i ?>">
                                    ver más
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="modal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Información extra del producto <?= $i ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, perspiciatis? 
                                            Officiis et ducimus blanditiis dicta asperiores labore iure, libero unde est aut 
                                            incidunt beatae accusantium. Architecto autem soluta laboriosam perspiciatis 
                                            laudantium beatae culpa, doloribus ipsum hic quae, quos officiis cumque.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endfor; ?>

                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const botones = document.querySelectorAll('.boton-carrito');

        botones.forEach(boton => {
            boton.addEventListener('click', () => {
                // quiero que la alerta se muestre por 2 segundos
                document.getElementById('alerta').classList.toggle('d-none');
                setTimeout(() => {
                    document.getElementById('alerta').classList.toggle('d-none');
                }, 1000);
            });
        });
    </script>
</body>
</html>